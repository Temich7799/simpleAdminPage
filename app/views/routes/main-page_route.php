<?php

require './app/models/MainPageModel.php';
require './app/models/UserPageModel.php';
require_once './app/controllers/LoginPageContoller.php';

$app->get('/', function ($request,  $response) {
    $main_page = new MainPageModel();
    $response->getBody()->write($main_page->renderPage());
    return $response;
});

$app->post('/sign-in', function ($request,  $response) {

    $data = $request->getParsedBody();
    ['username' => $username,  'password' => $password] = $data;

    $session = new LoginPageContoller($username, $password);
    $login_status = $session->loginUser();

    $content = '';

    if ($login_status == true) {
        $user_page = new UserPageModel();
        $content = $user_page->renderPage();
    } else $content = 'This user is not found or your password is wrong';

    $result = [
        'status' => $login_status,
        'content' => $content
    ];

    $response->getBody()->write(json_encode($result));

    return $response;
});
