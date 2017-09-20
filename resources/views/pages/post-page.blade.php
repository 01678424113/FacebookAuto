@extends('layout')
@section('content')
    <div class="col-md-10">
        <div class="post-page">
            <!--Show list page-->
            <div class="mt-5 mb-5">
                <h3>Danh sách các page của mình</h3>
                <hr>
                <form action="{{route('getPostPage')}}" method="post">
                    {{csrf_field()}}
                    <?php
                    $fb = new Facebook\Facebook([
                        'app_id' => env('FACEBOOK_APP_ID'),
                        'app_secret' => env('FACEBOOK_APP_SECRET'),
                        'default_graph_version' => env('FACEBOOK_API_VERSION'),
                    ]);
                    if ((Cookie::has('accessToken'))) {
                        $res = $fb->get('/me/accounts', Cookie::get('accessToken'));
                        $res = $res->getDecodedBody();
                        $checked = "";
                        foreach ($res['data'] as $page) {
                            if (isset($_POST['checkbox-page'])) {
                                foreach ($_POST['checkbox-page'] as $value) {
                                    if ($value == $page['id']) {
                                        $checked = "checked";
                                        break;
                                    } else {
                                        $checked = "";
                                    }
                                }
                            } else if (Session::get('page_ids')) {
                                foreach (Session::get('page_ids') as $page_id) {
                                    if ($page_id == $page['id']) {
                                        $checked = "checked";
                                        break;
                                    } else {
                                        $checked = "";
                                    }
                                }
                            }
                            echo "<input type='checkbox' name='checkbox-page[]'  value='" . $page['id'] . "' " . $checked . ">" . " " . $page['name'] . "-" . $page['id'] . "<br>";
                        }
                    }
                    ?>
                    <input type="submit" class="btn btn-info" style="margin-top: 5px;" id="btn-checkbox-page" value="Chọn page">
                </form>
            </div>
            <!--End show list page-->
            <!-- Lay access token-->
            <div>
                <form action="{{route('getAccessTokenPage')}}" method="post">
                    {{csrf_field()}}
                        <textarea name="page_ids" id="page_ids" style="width: 500px;height: 200px;"
                                  placeholder="Nhập id các page">
                            <?php
                            if (isset($_POST['checkbox-page'])) {
                                foreach ($_POST['checkbox-page'] as $value) {
                                    echo $value . ";";
                                }
                            } else if (Session::get('page_ids')) {
                                foreach (Session::get('page_ids') as $page_id) {
                                    echo $page_id . ";";
                                }
                            }
                            ?>
                        </textarea><br>
                    <input type="submit" class="btn btn-info" value="Lấy accesstoken">
                </form>
            </div>
            <!--End lay access token-->
            <div class="row mt-5 mb-5">
                <div class="col-md-6">
                    <div>
                        <h3>Post bài lên page đã chọn</h3>
                        <hr>
                        <textarea name="access_token" id="access_token_page" style="width: 100%;height: 200px;" >
                            <?php
                            if (Session::get('list_access_token') && count(Session::get('list_access_token')) > 0) {
                                foreach (Session::get('list_access_token') as $access_token_page) {
                                    echo $access_token_page . ";";
                                }
                            }
                            ?>
                            </textarea><br>
                        Link : <br> <input type="url" name="link" id="link" style="width: 100%"><br>
                        Message : <br> <input type="url" name="message" id="message" style="width: 100%"><br>

                        <!--Tự đăng sau :--> <br> <input type="text" id="time" value="">
                        <input type="button" value="Đăng bài" class="btn btn-info" onclick="StartPost()">
                        <a class="btn btn-danger" href={{route('reset')}}>Reset</a>
                    </div>
                    <hr>
                </div>
                <div class="col-md-6" >
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
    <script src="js/handling-page.js"></script>
@endsection