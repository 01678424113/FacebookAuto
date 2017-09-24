@extends('layout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-2">
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
@endsection
