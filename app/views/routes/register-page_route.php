<?php

require './app/controllers/RegisterPageController.php';

$app->get('/sign-up', function ($request,  $response) {
    $login_page = new RegisterPageController($request,  $response);
    return $login_page->registerPage();
});
/*
$app->post('/', function ($request,  $response) {

    return $response;
});
*/