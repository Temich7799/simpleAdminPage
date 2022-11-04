<?php

require './app/models/LoginPageModel.php';
require './app/controllers/LoginPageContoller.php';

$app->get('/', function ($request,  $response) {
    $login_page = new LoginPageModel();
    $response->getBody()->write($login_page->renderPage());
    return $response;
});

$app->post('/sign-in', function ($request,  $response) {

    $data = $request->getParsedBody();
    ['username' => $username,  'password' => $password] = $data;

    $session = new LoginPageContoller($username, $password);

    $result = [
        'status' => $session->isUserExist()
    ];

    $response->getBody()->write(json_encode($result));

    return $response;
});
