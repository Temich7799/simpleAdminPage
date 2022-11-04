<?php

require './app/models/ResetPasswordPageModel.php';

$app->get('/reset-password', function ($request,  $response) {
    $the_reset_page = new ResetPasswordPageModel();
    $response->getBody()->write($the_reset_page->renderPage());
    return $response;
});
