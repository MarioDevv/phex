<?php

namespace Phex\Tests\Shared\Domain\Model\Task;

use Phex\Domain\Model\Task\TaskId;
use Ramsey\Uuid\Uuid as RamseyUuid;

class TaskIdMother
{

    public static function create(string $value): TaskId
    {
        return new TaskId($value);
    }

    public static function random(): TaskId
    {
        return new TaskId(self::randomUuid());
    }

    private static function randomUuid(): string
    {
        return RamseyUuid::uuid4()->toString();
    }

}