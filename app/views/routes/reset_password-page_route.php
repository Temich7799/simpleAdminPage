<?php

require './app/models/ResetPasswordPageModel.php';

$app->get('/reset-password', function ($request,  $response) {
    $reset_page = new ResetPasswordPageModel();
    $response->getBody()->write($reset_page->renderPage());
    return $response;
});
