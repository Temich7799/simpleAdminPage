<?php

require './app/controllers/HomePageController.php';

$app->get('/', function ($request,  $response) {
    $login_page = new HomePageController($request,  $response);
    return $login_page->loginPage();
});

$app->post('/', function ($request,  $response) {
    $body = $request->getParsedBody();
    echo json_encode($body);
    return $response;
});
