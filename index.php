<?php

require __DIR__ . '/vendor/autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();
$app->setBasePath('/simpleAdminPage');

require './app/views/routes/home_route.php';

$app->run();
