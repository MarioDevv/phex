<?php

namespace Phex\Infrastructure\Delivery\API\Slim\Controller;

use JsonException;
use Phex\Shared\Infrastructure\Http\SmartRequestFactory;
use Psr\Http\Message\ResponseInterface as Response;

abstract class BaseController
{

    /** @throws JsonException */
    protected function respondWithJson(Response $response, array $data, int $statusCode = 200): Response
    {
        $json = json_encode($data, JSON_THROW_ON_ERROR);

        $response->getBody()->write($json);

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($statusCode);
    }

    /** @throws JsonException */
    protected function respondWithError(Response $response, string $message, int $statusCode = 400): Response
    {
        return $this->respondWithJson($response, [
            'status'  => 'error',
            'message' => $message,
        ], $statusCode);
    }

    /** @throws JsonException */
    protected function respondWithSuccess(Response $response, string $message, array $extra = [], int $statusCode = 200): Response
    {
        return $this->respondWithJson($response, array_merge([
            'status'  => 'success',
            'message' => $message,
        ], $extra), $statusCode);
    }
}