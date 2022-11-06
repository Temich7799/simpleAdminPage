<?php

require './app/models/MainPageModel.php';

$app->get('/', function ($request,  $response) {
    $main_page = new MainPageModel();
    $response->getBody()->write($main_page->renderPage());
    return $response;
});
