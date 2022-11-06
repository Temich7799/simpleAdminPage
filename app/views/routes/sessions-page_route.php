<?php

require './app/models/SessionsPageModel.php';

$app->get('/sessions', function ($request,  $response) {
    $main_page = new SessionsPageModel();
    $response->getBody()->write($main_page->renderPage());
    return $response;
});
