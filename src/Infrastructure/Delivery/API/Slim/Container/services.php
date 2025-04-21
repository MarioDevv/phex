<?php

declare(strict_types=1);

use DI\Container;
use Phex\Application\Task\Create\CreateTask;
use Phex\Application\Task\Find\FindTask;
use Phex\Domain\Model\Task\TaskRepository;
use Phex\Infrastructure\Delivery\Http\Validation\RakitValidator;
use Phex\Infrastructure\Delivery\Http\Validation\ValidatorInterface;
use Phex\Infrastructure\Domain\Model\Task\InMemory\InMemoryTaskRepository;

return function (Container $container): void {

    // --- TEST PURPOSE ONLY --- //
    $repository = new InMemoryTaskRepository();

    $task = \Phex\Tests\Shared\Domain\Model\Task\TaskMother::create(
        new \Phex\Domain\Model\Task\TaskId('00000000-0000-0000-0000-000000000001'),
    );

    $repository->save($task);

    // --- TEST PURPOSE ONLY --- //

    $container->set(TaskRepository::class, $repository);

    $container->set(CreateTask::class, fn(Container $c) => new CreateTask($repository));

    $container->set(FindTask::class, fn(Container $c) => new FindTask($repository));

    $container->set(ValidatorInterface::class, new RakitValidator());
};
