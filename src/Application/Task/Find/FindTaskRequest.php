<?php

namespace Phex\Application\Task\Find;

use Phex\Domain\Model\Task\TaskId;

class FindTaskRequest
{

    public function __construct(
        private readonly TaskId $id
    )
    {
    }

    public function id(): TaskId
    {
        return $this->id;
    }

}