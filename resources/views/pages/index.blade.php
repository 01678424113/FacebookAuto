@extends('layout')
@section('content')
    <div class="container" style="height: 100%">
        <div class="row">
            @if(empty($user->access_token_full) &&  Session::get('id_user'))

                <div class="">
                    <p class="alert alert-warning" style="color: black">Bạn cần lấy access token full quyền để thực hiện
                        được
                        đầy đủ các chức năng. Click dưới để tiếp tục</p>
                    <div class="btn btn-default"><a href="{{route('getAccessTokenFull')}}">Click now</a></div>
                </div>
            @elseif(!empty($user->access_token_full))
                <div class="col-md-6 alert alert-success">
                    <p style="color: black">Lấy access token full quyền thành công. Bạn có thể sử dụng các tính năng
                        chúng
                        tôi cung cấp !</p>
                    <hr>
                    <strong>Các tính năng nổi bật :</strong>
                    <ul>
                        <li>Tự động đăng bài lên page .</li>
                        <li>Tự động đăng bài lên group .</li>
                        <li>Tự động kết bạn .</li>
                        <li>Và nhiều tính năng khác ...</li>
                    </ul>
                </div>
            @endif
        </div>
        @if(empty(Session::get('id_user')))
            <div class="row">
                <div class="col-md-5 col-md-offset-2 alert alert-warning">
                    <p>Không cần đăng kí. Bạn có thể đăng nhập ngay bằng tài khoản FaceBook , Gmail hoặc Twiter. Click
                        dưới đây !!</p>
                    <hr>
                    <form style="text-align: center">
                        <a class="btn btn-info" href="{{ $login_url }}">FaceBook</a>
                        <a class="btn btn-danger" href="{{ $login_url }}">Gmail</a>
                        <a class="btn btn-default" href="{{ $login_url }}">Twiter</a>

                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
@section('script')

@endsection