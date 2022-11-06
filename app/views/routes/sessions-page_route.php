<?php

require './app/models/SessionsPageModel.php';
require_once './app/controllers/AdminController.php';

$app->get('/sessions', function ($request,  $response) {

    $main_page = new SessionsPageModel();
    $response->getBody()->write($main_page->renderPage());

    if (isset($_REQUEST['delete'])) {
        $session = new AdminController();
        $session->logOutUser($_REQUEST['delete']);
    }
    return $response;
});
