<?php

require './app/models/UsersPageModel.php';
require_once './app/controllers/AdminController.php';

$app->get('/users', function ($request,  $response) {

    $main_page = new UsersPageModel();
    $response->getBody()->write($main_page->renderPage());

    if (isset($_REQUEST['delete'])) {
        $session = new AdminController();
        $session->deleteUser($_REQUEST['delete']);
    }

    return $response;
});
