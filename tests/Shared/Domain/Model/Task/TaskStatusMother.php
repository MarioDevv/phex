<?php

namespace Phex\Tests\Shared\Domain\Model\Task;

use Phex\Domain\Model\Task\TaskStatus;

class TaskStatusMother
{

    public static function create(string $value): TaskStatus
    {
        return TaskStatus::from($value);
    }

    public static function random(): TaskStatus
    {
        $statuses = ['todo', 'in_progress', 'done'];
        return TaskStatus::from($statuses[array_rand($statuses)]);
    }

}