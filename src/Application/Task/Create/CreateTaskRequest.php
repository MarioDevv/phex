<?php

namespace Phex\Application\Task\Create;


class CreateTaskRequest
{
    public function __construct(
        public readonly string            $title,
        public readonly string            $description,
    )
    {
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): string
    {
        return $this->description;
    }

}