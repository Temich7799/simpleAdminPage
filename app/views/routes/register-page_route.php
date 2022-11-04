<?php

require './app/models/RegisterPageModel.php';

$app->get('/sign-up', function ($request,  $response) {
    $register_page = new RegisterPageModel();
    $response->getBody()->write($register_page->renderPage());
    return $response;
});
