<?php

namespace Phex\Tests\Unit\Application\Task\Create;

use DateTimeImmutable;
use Phex\Application\Task\Create\CreateTask;
use Phex\Application\Task\Create\CreateTaskRequest;
use Phex\Domain\Model\Task\Task;
use Phex\Domain\Model\Task\TaskRepository;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class CreateTaskTest extends TestCase
{

    /**
     * @throws Exception
     */
    public function test_it_creates_a_task(): void
    {
        $repository = $this->createMock(TaskRepository::class);

        $repository->expects($this->once())
            ->method('save')
            ->with($this->callback(function (Task $task) {
                $this->assertEquals('Título', (string) $task->title());
                $this->assertEquals('Descripción', $task->description());
                $this->assertEquals('todo', $task->status()->value);
                return true;
            }));

        $useCase = new CreateTask($repository);

        $request = new CreateTaskRequest(
            'Título',
            'Descripción',
        );

        $useCase($request);
    }

}