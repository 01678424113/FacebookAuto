var AppId = '874373596059321';
var FBLoaded = false;
//Handling login facebook

window.fbAsyncInit = function () {
    FB.init({
        appId: AppId,
        cookie: true, // This is important, it's not enabled by default
        xfbml: true,
        version: 'v2.10'
    });
    FBLoaded = true;
};

//Facebook SDK
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=" + AppId;
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
