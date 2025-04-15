<?php

namespace Phex\Tests\Acceptance\Application\Task\Find;

use Phex\Application\Task\Find\FindTask;
use Phex\Application\Task\Find\FindTaskRequest;
use Phex\Domain\Model\Task\TaskId;
use Phex\Domain\Model\Task\TaskNotFound;
use Phex\Infrastructure\Domain\Model\Task\InMemory\InMemoryTaskRepository;
use Phex\Tests\Shared\Domain\Model\Task\TaskMother;
use PHPUnit\Framework\TestCase;

class FindTaskAcceptanceTest extends TestCase
{

    public function it_should_find_a_task(): void
    {
        $repository = new InMemoryTaskRepository();

        $taskToFind = TaskMother::create();

        $repository->save($taskToFind);

        $findTask = new FindTask($repository);

        $foundTask = $findTask(new FindTaskRequest($taskToFind->id()));

        $this->assertEquals($taskToFind->id(), $foundTask->id());
    }

    public function test_it_throws_exception_when_task_does_not_exist(): void
    {
        $this->expectException(TaskNotFound::class);

        $repository = new InMemoryTaskRepository();
        $findTask = new FindTask($repository);

        $nonExistentId = new TaskId('123e4567-e89b-12d3-a456-426614174000');

        $findTask(new FindTaskRequest($nonExistentId));
    }

}