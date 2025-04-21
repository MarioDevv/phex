<?php

namespace Phex\Domain\Model\Task;

use Phex\Domain\DomainError;

class TaskNotFound extends DomainError
{

    protected function errorMessage(): string
    {
        return 'Task not found';
    }
}
