<?php

namespace Phex\Tests\Shared\Domain\Model\Task;

use Phex\Domain\Model\Task\TaskTitle;

class TaskTitleMother
{
    public static function create(string $value): TaskTitle
    {
        return new TaskTitle($value);
    }

    public static function random(): TaskTitle
    {
        return new TaskTitle('Task ' . rand(1, 9999));
    }
}