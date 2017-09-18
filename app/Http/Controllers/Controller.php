<?php

namespace App\Http\Controllers;

require_once 'C:\xampp1\htdocs\FacebookAuto/vendor/facebook/graph-sdk/src/Facebook/autoload.php';
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Facebook\Authentication\AccessToken;
use Facebook\FacebookApp;
use Facebook\FacebookRequest;

class Controller extends BaseController
{

    public function __construct()
    {

    }
}
