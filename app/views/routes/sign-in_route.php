<?php

require_once './app/controllers/LoginPageContoller.php';

$app->post('/sign-in', function ($request,  $response) {

    $data = $request->getParsedBody();
    ['username' => $username,  'password' => $password] = $data;

    $session = new LoginPageContoller();
    $login_status = $session->loginUser($username, $password);

    $content = '';

    if ($login_status === false) $content = 'This user is not found or your password is wrong';

    $result = [
        'status' => $login_status,
        'content' => $content
    ];

    $response->getBody()->write(json_encode($result));

    return $response;
});
