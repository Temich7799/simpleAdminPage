<?php

require './app/controllers/HomeController.php';

$app->get('/', function ($request,  $response) {
    $home = new HomeController($request,  $response);
    return $home->home();
});
