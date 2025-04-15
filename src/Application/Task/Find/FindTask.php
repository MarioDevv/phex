<?php

namespace Phex\Application\Task\Find;

use Phex\Domain\Model\Task\Task;
use Phex\Domain\Model\Task\TaskNotFound;
use Phex\Domain\Model\Task\TaskRepository;

class FindTask
{

    public function __construct(private TaskRepository $repository)
    {
    }

    public function __invoke(FindTaskRequest $request): Task
    {
        $task = $this->repository->find($request->id());

        if (null === $task) throw new TaskNotFound();

        return $task;
    }
}