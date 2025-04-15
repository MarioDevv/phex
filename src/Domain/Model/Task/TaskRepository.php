<?php

namespace Phex\Domain\Model\Task;

interface TaskRepository
{
    public function save(Task $task): void;

    public function find(TaskId $id): ?Task;

}