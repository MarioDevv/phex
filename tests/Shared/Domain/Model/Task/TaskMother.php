<?php

namespace Phex\Tests\Shared\Domain\Model\Task;

use DateTimeImmutable;
use Phex\Domain\Model\Task\Task;
use Phex\Domain\Model\Task\TaskId;
use Phex\Domain\Model\Task\TaskStatus;
use Phex\Domain\Model\Task\TaskTitle;

class TaskMother
{
    public static function create(
        ?TaskId            $id = null,
        ?TaskTitle         $title = null,
        ?string            $description = null,
        ?TaskStatus        $status = null,
        ?DateTimeImmutable $createdAt = null,
    ): Task
    {
        return new Task(
            $id ?? TaskIdMother::random(),
            $title ?? TaskTitleMother::random(),
            $description ?? TaskDescriptionMother::random(),
            $status ?? TaskStatusMother::random(),
            $createdAt ?? new DateTimeImmutable(),
        );
    }

    public static function withTitle(string $title): Task
    {
        return self::create(
            null,
            new TaskTitle($title)
        );
    }
}