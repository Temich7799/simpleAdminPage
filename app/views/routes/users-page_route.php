<?php

require './app/models/UsersPageModel.php';

$app->get('/users', function ($request,  $response) {
    $main_page = new UsersPageModel();
    $response->getBody()->write($main_page->renderPage());
    return $response;
});
