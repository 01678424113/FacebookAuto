<div class="menu-left">
    <p class="logo">Share.vn</p>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="fa fa-apple" aria-hidden="true"></i>
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Page</a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{route('getPostPage')}}">Đăng lên page</a></li>
                    <li class="list-group-item"><a href="{{route('showPage')}}">Danh sách page</a></li>
                    <li class="list-group-item"><a href="{{route('getAddPage')}}">Thêm page</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="fa fa-google-wallet" aria-hidden="true"></i>
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Group</a>
                </h4>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{route('getPostGroupMe')}}">Đăng lên group của bạn</a></li>
                    <li class="list-group-item"><a href="{{route('getPostGroupId')}}">Đăng lên group theo id</a></li>
                    <li class="list-group-item"><a href="{{route('getPostGroupCategory')}}">Đăng lên group theo thể loại</a></li>
                    <li class="list-group-item"><a href="{{route('getPostGroupPhoto')}}">Đăng ảnh group của bạn</a></li>
                    <li class="list-group-item"><a href="{{route('getPostGroupVideo')}}">Đăng video group của bạn</a></li>
                    <li class="list-group-item"><a href="{{route('showGroup')}}">Danh sách group</a></li>
                    <li class="list-group-item"><a href="{{route('getAddGroup')}}">Thêm group</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="fa fa-apple" aria-hidden="true"></i>
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Bài đăng</a>
                </h4>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{route('getPosts')}}">Lịch sử đăng</a></li>

                </ul>
            </div>
        </div>
    </div>
</div>

