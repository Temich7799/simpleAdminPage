<?php

require_once './app/controllers/LoginPageContoller.php';

$app->post('/sign-out', function ($request,  $response) {

    $session = new LoginPageContoller();
    $session->logOutUser();

    return $response;
});
