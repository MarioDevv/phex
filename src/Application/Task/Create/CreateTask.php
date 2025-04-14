<?php

namespace Phex\Application\Task\Create;

use Phex\Domain\Model\Task\Task;
use Phex\Domain\Model\Task\TaskRepository;

class CreateTask
{

    public function __construct(private TaskRepository $repository)
    {
    }

    public function __invoke(CreateTaskRequest $request): void
    {
        $task = Task::new(
            $request->title(),
            $request->description(),
            $request->createdAt()
        );

        $this->repository->save($task);
    }
}