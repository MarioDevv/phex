<?php

namespace Phex\Domain\Model\Task;

use DateTimeImmutable;

class Task
{
    public function __construct(
        private TaskId            $id,
        private TaskTitle         $title,
        private string            $description,
        private TaskStatus        $status,
        private DateTimeImmutable $createdAt,
    )
    {
    }

    public static function new(
        string $title,
        string $description,
    ): Task
    {
        return new self(
            TaskId::random(),
            new TaskTitle($title),
            $description,
            TaskStatus::TODO,
            new DateTimeImmutable()
        );
    }

    public function isDone(): bool
    {
        return $this->status === TaskStatus::DONE;
    }

    public function isInProgress(): bool
    {
        return $this->status === TaskStatus::IN_PROGRESS;
    }

    public function isNotStarted(): bool
    {
        return $this->status === TaskStatus::TODO;
    }

    public function id(): TaskId
    {
        return $this->id;
    }

    public function title(): TaskTitle
    {
        return $this->title;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function status(): TaskStatus
    {
        return $this->status;
    }

    public function createdAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}