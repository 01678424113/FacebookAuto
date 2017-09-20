/*****************************************************************************************/
/*******************************************Auto post group*****************************************/
/*****************************************************************************************/
var _accessTokenUser;

var _messageGroup;

var _List; // List id

var _ListIndex = -1;

var _monitor; // Message post

//Function start
function StartPostGroup() {
    _messageGroup = document.getElementById('message').value;
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
function _PostToGroupId( _groupid, _access_token_user) {
    FB.api('/' + _groupid + '/feed', 'post', {
        message: _messageGroup,
        access_token: _access_token_user
    }, function (response) {
        var ms_post = document.createElement('p');
        if (!response || response.error) {
            ms_post.innerHTML = "Có lỗi" + response.error + " khi post bài vào groupid = " + _groupid;
            _monitor.appendChild(ms_post);
        } else {
            ms_post.innerHTML = "Đã post thành công vào group id = " + _groupid;
            _monitor.appendChild(ms_post);
        }
    });
}
/*****************************************************************************************/
/*******************************************End auto post*****************************************/
/*****************************************************************************************/