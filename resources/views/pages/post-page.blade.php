@extends('layout')
@section('content')
    <div class="col-md-12">
        <div class="content-right post-page">
            <!--Show list page-->
            <div class="mt-5 mb-5">
                <h3>Danh sách các page của mình</h3>
                <hr>
                <form action="{{route('getPostPage')}}" method="post">
                    {{csrf_field()}}
                    <?php
                    $fb = new Facebook\Facebook([
                        'app_id' => env('FACEBOOK_APP_ID_ANDROID'),
                        'app_secret' => env('FACEBOOK_APP_SECRET_ANDROID'),
                        'default_graph_version' => env('FACEBOOK_API_VERSION'),
                    ]);
                    if ((Session::has('accessToken_user'))) {
                        $res = $fb->get('/me/accounts', Session::get('accessToken_user'));
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
                            echo " <div class='checkbox'>
                                    <label><input type='checkbox' name='checkbox-page[]' value='" . $page['id'] . "' " . $checked . ">" . $page['name'] . " - " . $page['id'] . "</label>
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
            <form action="{{route('getAccessTokenPage')}}" method="post">
                {{csrf_field()}}
                <textarea name="page_ids" id="page_ids" style="width: 500px;height: 200px;"
                          placeholder="Nhập id các page">
                            <?php
                    if (isset($_POST['checkbox-page'])) {
                        foreach ($_POST['checkbox-page'] as $value) {
                            echo trim($value) . ";";
                        }
                    } else if (Session::get('page_ids')) {
                        foreach (Session::get('page_ids') as $page_id) {
                            echo trim($page_id) . ";";
                        }
                    }
                    ?>
                        </textarea><br>
            </form>
            <!--End lay access token-->
            <div class="row mt-5 mb-5">
                <div class="col-md-6">
                    <div>
                        <h3>Post bài lên page đã chọn</h3>
                        <hr>
                        <textarea name="access_token" id="access_token_page" style="width: 100%;height: 200px;" hidden>
                            @if(Session::has('accessToken_user'))
                                {{trim(Session::get('accessToken_user'))}}
                            @endif
                            </textarea><br>
                        <div class="form-group">
                            <label for="link">Link :</label>
                            <input type="url" class="form-control" name="link" id="link">
                        </div>

                        <div class="form-group">
                            <label for="message">Message :</label>
                            <input type="url" class="form-control" name="message" id="message">
                        </div>

                        <div class="form-group">
                            <label for="time">Tự đăng sau :</label>
                            <input type="number" class="form-control" name="time" id="time">
                        </div>

                        <input type="button" value="Đăng bài" class="btn btn-info" onclick="StartPost()">
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
    <script src="js/handling-page.js"></script>
@endsection