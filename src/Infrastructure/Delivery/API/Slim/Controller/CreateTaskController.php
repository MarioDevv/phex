<?php

namespace Phex\Infrastructure\Delivery\API\Slim\Controller;

use Phex\Application\Task\Create\CreateTask;
use Phex\Application\Task\Create\CreateTaskRequest;
use Phex\Infrastructure\Delivery\Http\SmartRequestFactory;
use Phex\Infrastructure\Delivery\Http\Validation\ValidatorInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Throwable;

class CreateTaskController extends BaseController
{

    private array $rules = [
        'title' => 'required'
    ];



    public function __construct(
        private readonly CreateTask   $createTask,
        protected SmartRequestFactory $factory,
        private readonly ValidatorInterface $validator
    )
    {
    }

    public function __invoke(Request $request, Response $response): Response
    {

        try {

            $dto = $this->factory->instantiate($request, CreateTaskRequest::class, $this->validator, $this->rules);

            ($this->createTask)($dto);

            return $this->respondWithSuccess(
                $response,
                'Task created successfully',
            );

        } catch (\InvalidArgumentException $exception) {
            return $this->respondWithError(
                $response,
                $exception->getMessage(),
                422
            );
        } catch (Throwable $th) {
            var_dump($th->getMessage());
            return $this->respondWithError(
                $response,
                'Something went wrong',
                500
            );
        }


    }
}
