@extends('layout')
@section('content')
    <div class="col-md-10">
        <div class="content-right post-group">
            <div class="row">
                <div class="col-md-6">
                    <div class="content-test">
                        <h3>Chọn group theo thể loại :</h3>
                        <hr>
                        <form action="{{route('postPostGroupCategory')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <select class="form-control" id="categories">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="groups">

                            </div>
                            <input type="submit" class="btn btn-info" style="margin-top: 5px;" id="btn-checkbox-page"
                                   value="Chọn page">
                        </form>
                    </div>
                </div>
            </div>
            <!-- Lay id group-->
            <div class="form-group">
                <h3>Các id groups đã được chọn :</h3>
                <label for="group_ids">Id group :</label>
                <textarea name="group_ids" class="form-control" id="group_ids" style="width: 500px;height: 200px;"
                          placeholder="Nhập id các page"><?php if (isset($_POST['checkbox-page'])) {
                        foreach ($_POST['checkbox-page'] as $value) {
                            echo trim($value) . ";";
                        }
                    } ?></textarea>
            </div>
            <!--End lay id group-->
            <div class="row mt-5 mb-5">
                <div class="col-md-6">
                    <div>
                        <h3>Post bài lên group đã chọn</h3>
                        <hr>
                        <div class="form-group">
                            <label for="message">Message :</label>
                            <input type="text" class="form-control" name="message" id="message">
                        </div>
                        <textarea hidden name="access_token_user" style="width: 500px;height: 200px;"
                                  id="access_token_user"><?php if (Session::has('accessToken_user')) {
                                echo Session::get('accessToken_user');
                            }?></textarea>
                        <br>
                        <div class="form-group">
                            <label for="time">Tự đăng sau :</label>
                            <input type="number" class="form-control" name="time" id="time">
                        </div>
                        <input type="button" value="Đăng bài" class="btn btn-info" onclick="StartPostGroup()">
                        <a class="btn btn-danger" href={{route('reset')}}>Reset</a>
                    </div>
                    <hr>
                </div>
                <div class="col-md-6">
                    <h4 style="padding-top: 16px;">Monitor | <span id="timer">0</span> giây</h4>
                    <hr>
                    <div id="response" style="height:300px;padding: 10px">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="js/handling-group.js"></script>
    <script>
        $(document).ready(function () {
            $('#categories').change(function () {
                var id_category = $(this).val();
                $.get("user/ajax/group/" + id_category, function (data) {
                    $('#groups').html(data);
                });
            });
        });
    </script>
@endsection