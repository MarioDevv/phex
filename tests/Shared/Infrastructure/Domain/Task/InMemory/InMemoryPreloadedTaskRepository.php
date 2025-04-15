<?php

namespace Phex\Tests\Shared\Infrastructure\Domain\Task\InMemory;

use Phex\Domain\Model\Task\Task;
use Phex\Domain\Model\Task\TaskId;
use Phex\Domain\Model\Task\TaskNotFound;
use Phex\Tests\Shared\Domain\Model\Task\TaskMother;

class InMemoryPreloadedTaskRepository
{

    /** @var array<string, Task> */
    private array $tasks = [];

    public function __construct()
    {
        $this->save(TaskMother::withTitle('Primera tarea'));
        $this->save(TaskMother::withTitle('Segunda tarea'));
        $this->save(TaskMother::withTitle('Tercera tarea'));
    }

    public function save(Task $task): void
    {
        $this->tasks[(string) $task->id()] = $task;
    }

    public function find(TaskId $id): Task
    {
        $key = (string) $id;

        if (!isset($this->tasks[$key])) {
            throw new TaskNotFound();
        }

        return $this->tasks[$key];
    }

}