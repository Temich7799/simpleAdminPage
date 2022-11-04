<?php

require './app/models/LoginPageModel.php';
require './app/models/UserPageModel.php';
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
    $is_user_exist = $session->isUserExist();

    $content = '';

    if ($is_user_exist == true) {
        $user_page = new UserPageModel();
        $content = $user_page->renderPage();
    } else $content = 'This user is not found or your password is wrong';

    $result = [
        'status' => $is_user_exist,
        'content' => $content
    ];

    $response->getBody()->write(json_encode($result));

    return $response;
});
