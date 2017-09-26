@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-2">
                <form action="{{route('postAccessTokenFull')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="username">Username :</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập facebook">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button id="click" type="submit" class="btn btn-default">Lấy access token</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
   {{-- <script>
        $(document).ready(function () {
            $('#click').click(function () {
                var password = $('#password').val();
                alert(password);
            });
        });
    </script>--}}
@endsection
