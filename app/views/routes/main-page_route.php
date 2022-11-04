<?php

require './app/models/LoginPageModel.php';

$app->get('/', function ($request,  $response) {
    $login_page = new LoginPageModel();
    $response->getBody()->write($login_page->renderPage());
    return $response;
});

$app->post('/', function ($request,  $response) {
    $body = $request->getParsedBody();
    echo json_encode($body);
    return $response;
});
