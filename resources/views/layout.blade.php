<?php
require_once 'C:\xampp1\htdocs\FacebookAuto/vendor/facebook/graph-sdk/src/Facebook/autoload.php';
use Facebook\Authentication\AccessToken;
use Facebook\FacebookApp;
use Facebook\FacebookRequest;
session_start();
//Config Id và Secret của APP
$app_id = '874373596059321';
$app_secret = '78935dae89f1369b79abb2bc812f80c6';
$fb = new Facebook\Facebook(array(
    'app_id' => $app_id,
    'app_secret' => $app_secret,
    'default_graph_version' => 'v2.5',
));
?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
@include('layout.header')
<div class="container-fluid">
    <div class="row">
        @include('layout.menu-left')

        @yield('content')

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<script src="js/handling.js"></script>

</body>
</html>