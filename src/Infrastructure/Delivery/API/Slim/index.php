<?php

declare(strict_types=1);

use DI\Container;
use Slim\Factory\AppFactory;

require __DIR__ . '/../../../../../vendor/autoload.php';

$container = new Container();

(require __DIR__ . '/Container/services.php')($container);

AppFactory::setContainer($container);
$app = AppFactory::create();

(require __DIR__ . '/routes.php')($app);

$app->addBodyParsingMiddleware();
$app->run();
