<?php

namespace Phex\Tests\Acceptance\Application\Task\Create;

use DateTimeImmutable;
use Phex\Application\Task\Create\CreateTask;
use Phex\Application\Task\Create\CreateTaskRequest;
use Phex\Domain\Model\Task\TaskStatus;
use Phex\Infrastructure\Domain\Model\Task\InMemory\InMemoryTaskRepository;
use PHPUnit\Framework\TestCase;

class CreateTaskAcceptanceTest extends TestCase
{

    /** @test */
    public function it_should_create_a_task(): void
    {
        $repository = new InMemoryTaskRepository();
        $useCase = new CreateTask($repository);

        $title = 'Write acceptance test';
        $description = 'Verify that the task can be created';
        $createdAt = new DateTimeImmutable();

        $request = new CreateTaskRequest($title, $description, $createdAt);

        $useCase($request);


        $tasks = $repository->all();

        $this->assertCount(1, $tasks);
        $this->assertEquals($title, (string) $tasks[0]->title());
        $this->assertEquals($description, $tasks[0]->description());
        $this->assertEquals(TaskStatus::TODO, $tasks[0]->status());
        $this->assertEquals($createdAt, $tasks[0]->createdAt());

    }

}