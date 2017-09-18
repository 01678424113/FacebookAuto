@extends('layout')
@section('content')
    <div class="col-md-10">
        <div class="post-page">
            <!--Show list page-->
            <div class="mt-5 mb-5">
                <h3>Danh sách các group của mình</h3>
                <hr>
                <form action="http://localhost/FacebookAPI//pages/post-group.php" method="post">
                    <?php
                    if (isset($_COOKIE["accessToken"])) {
                        $res = $fb->get('/me/groups', $_COOKIE["accessToken"]);
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
                            echo "<input type='checkbox' name='checkbox-page[]'  value='" . $group['id'] . "' " . $checked . ">" . " " . $group['name'] . "-" . $group['id'] . "<br>";
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
                        Message : <br> <input type="text" name="message" id="message" style="width: 100%"><br>
                        <input type="text" name="access_token_user" id="access_token_user" value="<?php if (isset($_COOKIE['accessToken'])) {
                            echo $_COOKIE['accessToken'];
                        } ?>"><br>
                        Tự đăng sau : <br> <input type="text" id="time" value="">
                        <input type="button" value="Đăng bài" class="btn btn-info" onclick="StartPostGroup()">
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