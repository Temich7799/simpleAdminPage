<?php

require './app/controllers/ResetPasswordPageController.php';

$app->get('/reset-password', function ($request,  $response) {
    $login_page = new ResetPasswordPageController($request,  $response);
    return $login_page->resetPasswordPage();
});
/*
$app->post('/', function ($request,  $response) {

    return $response;
});
*/