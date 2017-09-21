@extends('layout')
@section('content')
    <div class="col-md-10">
        <div class="content-right post-group">
            <!--Show list page-->
            <div class="mt-5 mb-5">
                <h3>Danh sách các group của mình</h3>
                <hr>
                <form action="{{route('postPostGroup')}}" method="post">
                    {{csrf_field()}}
                    <?php
                    $fb = new Facebook\Facebook([
                        'app_id' => env('FACEBOOK_APP_ID'),
                        'app_secret' => env('FACEBOOK_APP_SECRET'),
                        'default_graph_version' => env('FACEBOOK_API_VERSION'),
                    ]);
                    if (Cookie::has('accessToken')) {
                        $res = $fb->get('/me/groups', Cookie::get('accessToken'));
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
                                    <label><input type='checkbox' name='checkbox-page[]' value='".$group['id']."' ".$checked.">".$group['name']." - ".$group['id']."</label>
                                   </div>";
                        }
                    }
                    ?>
                    <input type="submit" class="btn btn-info" style="margin-top: 5px;" id="btn-checkbox-page"
                           value="Chọn page">

                </form>
            </div>
            <!--End show list page-->
            <!-- Lay access token-->
            <div>
                <textarea name="group_ids" id="group_ids" style="width: 500px;height: 200px;" placeholder="Nhập id các page"><?php if (isset($_POST['checkbox-page'])) {foreach ($_POST['checkbox-page'] as $value) {echo $value . ";";}} ?></textarea><br>
            </div>
            <!--End lay access token-->
            <div class="row mt-5 mb-5">
                <div class="col-md-6">
                    <div>
                        <h3>Post bài lên group đã chọn</h3>
                        <hr>
                        <div class="form-group">
                            <label for="message">Message :</label>
                            <input type="text" class="form-control" name="message" id="message">
                        </div>
                        <textarea name="access_token_user" style="width: 500px;height: 200px;" id="access_token_user"><?php if (Cookie::has('accessToken')) { echo Cookie::get('accessToken');}?></textarea>
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
@endsection