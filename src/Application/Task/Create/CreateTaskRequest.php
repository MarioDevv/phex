<?php

namespace Phex\Application\Task\Create;

use DateTimeImmutable;

class CreateTaskRequest
{
    public function __construct(
        public readonly string            $title,
        public readonly string            $description,
        public readonly DateTimeImmutable $createdAt,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['title'],
            $data['description'],
            DateTimeImmutable::createFromFormat(
                'Y-m-d h:i:s',
                $data['createdAt']
            ),
        );
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function createdAt()
    {
        return $this->createdAt;
    }
}