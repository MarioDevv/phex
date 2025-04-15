<?php

namespace Phex\Tests\Unit\Application\Task\Find;

use Phex\Application\Task\Find\FindTask;
use Phex\Application\Task\Find\FindTaskRequest;
use Phex\Domain\Model\Task\TaskNotFound;
use Phex\Domain\Model\Task\TaskRepository;
use Phex\Tests\Shared\Domain\Model\Task\TaskIdMother;
use Phex\Tests\Shared\Domain\Model\Task\TaskMother;
use PHPUnit\Framework\TestCase;

class FindTaskTest extends TestCase
{


    /** @test */
    public function it_should_find_a_task(): void
    {
        $task = TaskMother::create();
        $repository = $this->createMock(TaskRepository::class);

        $repository->method('find')
            ->with($task->id())
            ->willReturn($task);

        $useCase = new FindTask($repository);

        $result = $useCase(new FindTaskRequest($task->id()));

        $this->assertEquals($task->id(), $result->id());
        $this->assertEquals((string) $task->title(), (string) $result->title());
    }

    /** @test */
    public function it_should_throw_an_exception_if_task_does_not_exist(): void
    {
        $this->expectException(TaskNotFound::class);

        $repository = $this->createMock(TaskRepository::class);
        $repository->method('find')->willThrowException(new TaskNotFound());

        $useCase = new FindTask($repository);
        $useCase(new FindTaskRequest(TaskIdMother::random()));
    }

}