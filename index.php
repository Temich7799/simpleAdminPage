<?php

require __DIR__ . '/vendor/autoload.php';

use Slim\Factory\AppFactory;

$app = AppFactory::create();
$app->setBasePath('/simpleAdminPage');

require './app/views/routes/home-page_route.php';
require './app/views/routes/register-page_route.php';
require './app/views/routes/reset_password-page_route.php';

$app->run();
