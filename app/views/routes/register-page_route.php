<?php

require './app/models/RegisterPageModel.php';
require './app/controllers/RegisterPageController.php';

$app->get('/sign-up', function ($request,  $response) {
    $register_page = new RegisterPageModel();
    $response->getBody()->write($register_page->renderPage());
    return $response;
});

$app->post('/sign-up', function ($request,  $response) {

    $register_page = new RegisterPageController();

    $data = $request->getParsedBody();
    ['email' => $email,  'username' => $username,  'password' => $password] = $data;

    $result = $register_page->registerUser($email,  $username,  $password);

    $response->getBody()->write(json_encode($result));

    return $response;
});
