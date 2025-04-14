<?php

namespace Phex\Domain\Model\Task;

enum TaskStatus: string
{
    case TODO        = 'todo';
    case IN_PROGRESS = 'in_progress';
    case DONE        = 'done';

}