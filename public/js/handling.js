
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
    FB.getLoginStatus(function (response) {
        statusChangeCallback(response);
    });
};
//  Đăng xuất khỏi ứng
function FBLogout() {
    if (FBLoaded) {
        // Logout
        FB.logout();

        window.location = 'http://localhost/FacebookAPI/FBlogout.php';
        // Kiểm tra lại trạng thái đăng nhập
        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        });

    } else {
        setTimeout("FBLogout()", 100);
    }
    FB.getLoginStatus(function (response) {
        statusChangeCallback(response);
    });
}
logInWithFacebook = function () {
    var scope = 'publish_pages,public_profile,user_managed_groups,email,,publish_actions';
    window.location = 'http://graph.facebook.com/oauth/authorize?client_id=' + AppId + '&scope='+ scope +'&redirect_uri=http://localhost/FacebookAPI/get_user_access_token.php&response_type=token';
};
// Handling status login
function statusChangeCallback(response) {
    if (response.status === 'connected') {

    }
}
//End handling login facebook
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


/*****************************************************************************************/
/*******************************************Auto post page*****************************************/
/*****************************************************************************************/
var _List; // List id

var _ListIndex = -1;

var _link; // Attribute link
var _message; // Attribute message


var _List_access_token; // List access token page

var _monitor; // Message post

//Function start
function StartPost() {
    _link = document.getElementById('link').value;
    _message = document.getElementById('message').value;
    _monitor = document.getElementById('response');
    _List = document.getElementById('page_ids').value.split(';');
    _List_access_token = document.getElementById('access_token_page').value.split(';');
    _ListIndex = -1;
    _wait_time = parseInt(document.getElementById('time').value);
    setTimeout("_AutoCall()", 1000);
}
function _AutoCall() {
    var CallAutoCall = true;
    if (_wait_time === 0) {
        _wait_time = parseInt(document.getElementById('time').value);
        _ListIndex++;
        if (_ListIndex < _List.length) {
            //Delete space
            if (_List[_ListIndex] === "" || _List_access_token[_ListIndex] === "") {
                CallAutoCall = false;
            } else {
                _List[_ListIndex] = _List[_ListIndex].trim();
                _List_access_token[_ListIndex] = _List_access_token[_ListIndex].trim();
                _PostToPageId(_List[_ListIndex], _List_access_token[_ListIndex]);
            }
        } else {
            CallAutoCall = false;
        }
    } else {
        _wait_time--;
        document.getElementById('timer').innerHTML = _wait_time;
    }
    if (CallAutoCall) {
        setTimeout("_AutoCall()", 1000);
    } else {
        var _p = document.createElement('p');
        _p.innerHTML = '*** ĐÃ HẾT NHÓM CẦN POST';
        _monitor.appendChild(_p);
    }
}

//Run post
function _PostToPageId(_pageid, _access_token_page) {
    FB.api('/' + _pageid + '/feed', 'post', {
        link: _link,
        message: _message,
        access_token: _access_token_page
    }, function (response) {
        var ms_post = document.createElement('p');
        if (!response || response.error) {
            ms_post.innerHTML = "Có lỗi" + response.error + " khi post bài vào pageid = " + _pageid;
            _monitor.appendChild(_p);
        } else {
            /* alert(_groupid);
             document.getElementById('postid').value = response.id;*/
            ms_post.innerHTML = "Đã post thành công vào page id = " + _pageid;
            _monitor.appendChild(ms_post);
        }
    });
}
/*****************************************************************************************/
/*******************************************End auto post page*****************************************/
/*****************************************************************************************/

/*****************************************************************************************/
/*******************************************Auto post group*****************************************/
/*****************************************************************************************/
var _accessTokenUser;
//Function start
function StartPostGroup() {
    _message = document.getElementById('message').value;
    _accessTokenUser = document.getElementById('access_token_user').value;
    _monitor = document.getElementById('response');
    _List = document.getElementById('group_ids').value.split(';');
    _ListIndex = -1;
    _wait_time = parseInt(document.getElementById('time').value);
    setTimeout("_AutoCallGroup()", 1000);
}
function _AutoCallGroup() {
    var CallAutoCallGroup = true;
    if (_wait_time === 0) {
        _wait_time = parseInt(document.getElementById('time').value);
        _ListIndex++;
        if (_ListIndex < _List.length) {
            //Delete space
            if (_List[_ListIndex] === "") {
                CallAutoCallGroup = false;
            } else {
                _List[_ListIndex] = _List[_ListIndex].trim();
                _PostToGroupId(_List[_ListIndex], _accessTokenUser);
            }
        } else {
            CallAutoCallGroup = false;
        }
    } else {
        _wait_time--;
        document.getElementById('timer').innerHTML = _wait_time;
    }
    if (CallAutoCallGroup) {
        setTimeout("_AutoCallGroup()", 1000);
    } else {
        var _p = document.createElement('p');
        _p.innerHTML = '*** ĐÃ HẾT NHÓM CẦN POST';
        _monitor.appendChild(_p);
    }
}
//Run post
function _PostToGroupId(_groupid, _access_token_user) {
    FB.api('/' + _groupid + '/feed', 'post', {
        message: _message,
        access_token: _access_token_user
    }, function (response) {
        var ms_post = document.createElement('p');
        if (!response || response.error) {
            ms_post.innerHTML = "Có lỗi" + response.error + " khi post bài vào groupid = " + _groupid;
            _monitor.appendChild(_p);
        } else {
            /* alert(_groupid);
             document.getElementById('postid').value = response.id;*/
            ms_post.innerHTML = "Đã post thành công vào group id = " + _groupid;
            _monitor.appendChild(ms_post);
        }
    });
}
/*****************************************************************************************/
/*******************************************End auto post*****************************************/
/*****************************************************************************************/
