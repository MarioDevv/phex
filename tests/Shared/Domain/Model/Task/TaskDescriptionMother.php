<?php

namespace Phex\Tests\Shared\Domain\Model\Task;

class TaskDescriptionMother
{

    public static function random(): string
    {
        return 'Description ' . rand(1, 9999);
    }

}