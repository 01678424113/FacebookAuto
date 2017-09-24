@extends('layout')
@section('content')
    <div class="col-md-12">
        <div class="content-right post-group">
            <div class="row">
                <div class="col-md-6">
                    <!--Show list group-->
                    <div class="mt-5 mb-5">
                        <h3>Danh sách các group của mình</h3>
                        <hr>
                        <form action="{{route('postPostGroupMe')}}" method="post">
                            {{csrf_field()}}
                            <?php
                            $fb = new Facebook\Facebook([
                                'app_id' => env('FACEBOOK_APP_ID'),
                                'app_secret' => env('FACEBOOK_APP_SECRET'),
                                'default_graph_version' => env('FACEBOOK_API_VERSION'),
                            ]);
                            if (Session::has('accessToken_user')) {
                                $res = $fb->get('/me/groups', Session::get('accessToken_user'));
                                $res = $res->getDecodedBody();
                                $checked = "";
                                foreach ($res['data'] as $group) {
                                    if (isset($_POST['checkbox-page'])) {
                                        foreach ($_POST['checkbox-page'] as $value) {
                                            if ($value == $group['id']) {
                                                $checked = "checked";
                                                break;
                                            } else {
                                                $checked = "";
                                            }
                                        }
                                    }
                                    echo " <div class='checkbox'>
                                    <label><input type='checkbox' name='checkbox-page[]' value='" . $group['id'] . "' " . $checked . ">" . $group['name'] . " - " . $group['id'] . "</label>
                                   </div>";
                                }
                            }
                            ?>
                            <input type="submit" class="btn btn-info" style="margin-top: 5px;" id="btn-checkbox-page"
                                   value="Chọn page">

                        </form>
                    </div>
                    <!--End show list group-->
                </div>
                <div class="col-md-6">
                    <!-- Lay id group-->
                    <div class="form-group">
                        <h3>Các id groups đã được chọn :</h3>
                        <hr>
                        <label for="group_ids">ID group :</label>
                        <textarea name="group_ids" class="form-control" id="group_ids" style="width: 500px;height: 200px;"
                                  placeholder="Nhập id các page"><?php if (isset($_POST['checkbox-page'])) {
                                foreach ($_POST['checkbox-page'] as $value) {
                                    echo trim($value) . ";";
                                }
                            } ?></textarea>
                    </div>
                    <!--End lay id group-->
                </div>
            </div>
            <div class="row mt-5 mb-5">
                <div class="col-md-6">
                    <div>
                        <h3>Đăng bài lên group đã chọn</h3>
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
                    <h3>Thông báo | <span id="timer">0</span> giây</h3>
                    <hr>
                    <div id="response" class="alert alert-info" style="height:auto;padding: 10px">
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