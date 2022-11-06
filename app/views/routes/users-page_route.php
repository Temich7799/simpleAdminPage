<?php

require './app/models/UserPageModel.php';

$app->get('/users', function ($request,  $response) {
    $main_page = new UserPageModel();
    $response->getBody()->write($main_page->renderPage());
    return $response;
});
