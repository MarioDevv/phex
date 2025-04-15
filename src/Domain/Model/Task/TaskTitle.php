<?php

namespace Phex\Domain\Model\Task;
use InvalidArgumentException;
use Stringable;

class TaskTitle implements Stringable
{
    public function __construct(private string $value)
    {
        if (empty($value)) {
            throw new InvalidArgumentException('Task title cannot be empty.');
        }

        if (strlen($value) > 255) {
            throw new InvalidArgumentException('Task title cannot exceed 255 characters.');
        }

    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}