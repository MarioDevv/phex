<?php

declare(strict_types=1);

use Phex\Infrastructure\Delivery\API\Slim\Controller\CreateTaskController;
use Phex\Infrastructure\Delivery\API\Slim\Controller\FindTaskController;
use Slim\App;

return function (App $app): void {
    $app->post('/tasks', CreateTaskController::class);
    $app->get('/tasks/{id}', FindTaskController::class);
};
