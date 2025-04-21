<?php

namespace Phex\Infrastructure\Delivery\API\Slim\Controller;

use Phex\Application\Task\Find\FindTask;
use Phex\Application\Task\Find\FindTaskRequest;
use Phex\Infrastructure\Delivery\Http\SmartRequestFactory;
use Phex\Infrastructure\Delivery\Http\Validation\ValidatorInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class FindTaskController extends BaseController
{

    private array $rules = [
        'id' => 'required'
    ];

    public function __construct(
        private readonly FindTask           $findTask,
        protected SmartRequestFactory       $factory,
        private readonly ValidatorInterface $validator
    )
    {
    }


    public function __invoke(Request $request, Response $response): Response
    {
        try {

            $routeParams = [
                'id' => $request->getAttribute('id')
            ];


            $dto = SmartRequestFactory::instantiateFromArray(
                $routeParams, FindTaskRequest::class, $this->validator, $this->rules
            );

            $task = ($this->findTask)($dto);

            return $this->respondWithSuccess(
                $response,
                'Task found successfully',
                [
                    'task' => $task
                ]
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
