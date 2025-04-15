<?php

namespace Phex\Infrastructure\Domain\Model\Task\InMemory;

use Phex\Domain\Model\Task\Task;
use Phex\Domain\Model\Task\TaskId;
use Phex\Domain\Model\Task\TaskRepository;

class InMemoryTaskRepository implements TaskRepository
{

    /** @var array<string, Task> */
    private array $records = [];

    public function save(Task $task): void
    {
        $this->records[(string) $task->id()] = $task;
    }

    public function find(TaskId $id): ?Task
    {
        $index = (string) $id;

        if (!isset($this->records[$index])) {
            return null;
        }

        return $this->records[$index];
    }

    public function all(): array
    {
        return array_values($this->records);
    }


}