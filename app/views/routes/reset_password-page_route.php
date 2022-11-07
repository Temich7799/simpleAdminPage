<?php

require './app/models/ResetPasswordPageModel.php';
require_once './app/controllers/RegisterPageController.php';

$app->get('/reset-password', function ($request,  $response) {
    $the_reset_page = new ResetPasswordPageModel();
    $response->getBody()->write($the_reset_page->renderPage());
    return $response;
});

$app->post('/reset-password', function ($request,  $response) {

    $reset_password = new RegisterPageController();

    ['email' => $email] = $request->getParsedBody();

    $response->getBody()->write(json_encode(['content' => $reset_password->updatePassword($email)]));
    return $response;
});
