<?php

namespace App\Http\Controllers;

use Cookie;
use Illuminate\Http\Request;
use Facebook;
use URL;

class FacebookController extends Controller
{
    private $fb;

    public function __construct()
    {
        $this->fb = new Facebook\Facebook([
            'app_id' => env('FACEBOOK_APP_ID'),
            'app_secret' => env('FACEBOOK_APP_SECRET'),
            'default_graph_version' => env('FACEBOOK_API_VERSION'),
        ]);
    }

    public function facebookLogin(Request $request)
    {
        $helper = $this->fb->getRedirectLoginHelper();
        $permissions = ['publish_pages,public_profile,user_managed_groups,publish_actions,user_likes,manage_pages,pages_show_list'];
        $loginURL = $helper->getLoginUrl(action('FacebookController@facebookLoginCallback'), $permissions);
        return view('facebook.login', ['login_url' => $loginURL]);
    }

    public function facebookLoginCallback(Request $request)
    {
        $helper = $this->fb->getRedirectLoginHelper();

        $helper->getPersistentDataHandler()->set('state', $request->input('state'));

        try {
            session_start();

            $accessToken = $helper->getAccessToken();
            // OAuth 2.0 client handler
            $oAuth2Client = $this->fb->getOAuth2Client();

            // Exchanges a short-lived access token for a long-lived one
            $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            $this->fb->setDefaultAccessToken($accessToken);
            $response = $this->fb->get('/me?feilds=email,name');
            $usernode = $response->getGraphUser();
            $user_name = $usernode->getName();

            return redirect('/')->withCookies([Cookie::make('user_name', $user_name, 60),
                                                Cookie::make('accessToken',$accessToken,60)]);
        } catch (\Exception $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (\Exception $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    }

    public function facebookLogout()
    {
        session_start();

        session_destroy();

        Cookie::queue(Cookie::forget('user_name'));
        Cookie::queue(Cookie::forget('accessToken'));

        return redirect('/');
    }
}
