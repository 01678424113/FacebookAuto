@extends('layout')
@section('content')
    @if(empty($user->access_token_full) &&  Session::get('id_user'))
        <div class="col-md-4 col-md-offset-4 text-center">
            <p class="alert alert-warning" style="color: black">Bạn cần lấy access token full quyền để thực hiện được
                đầy đủ các chức năng. Click dưới để tiếp tục</p>
            <div class="btn btn-default"><a href="{{route('getAccessTokenFull')}}">Click now</a></div>
        </div>
    @else
        <div class="col-md-4 col-md-offset-4 text-center">
            <p class="alert alert-success" style="color: black">Lấy access token full quyền thành công. Bạn có thể sử dụng các tính năng chúng tôi cung cấp</p>
        </div>
    @endif
    @if(empty(Session::get('id_user')))
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-offset-2">
                    <h3>Đăng nhập</h3>
                    <hr>
                    <form>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox"> Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-default">Đăng nhập</button>
                        <a class="btn btn-default" href="{{ $login_url }}">Đăng nhập bằng Facebook</a>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection