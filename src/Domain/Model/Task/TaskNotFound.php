<?php

namespace Phex\Domain\Model\Task;

use Phex\Shared\Domain\DomainError;

class TaskNotFound extends DomainError
{

    protected function errorMessage(): string
    {
        return 'Task not found';
    }
}