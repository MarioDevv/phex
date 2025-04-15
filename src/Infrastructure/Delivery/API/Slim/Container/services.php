<?php

declare(strict_types=1);

use DI\Container;
use Phex\Application\Task\Create\CreateTask;
use Phex\Application\Task\Find\FindTask;
use Phex\Domain\Model\Task\TaskRepository;
use Phex\Infrastructure\Domain\Model\Task\InMemory\InMemoryTaskRepository;
use Phex\Shared\Infrastructure\Http\Validation\RakitValidator;
use Phex\Shared\Infrastructure\Http\Validation\ValidatorInterface;

return function (Container $container): void {

    // Test purpose only
    $repository = new InMemoryTaskRepository();

    $container->set(TaskRepository::class, $repository);

    $container->set(CreateTask::class, fn(Container $c) => new CreateTask($repository));

    $container->set(FindTask::class, fn(Container $c) => new FindTask($repository));

    $container->set(ValidatorInterface::class, new RakitValidator());
};
