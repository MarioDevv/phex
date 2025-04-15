<?php

declare(strict_types=1);

namespace Phex\Shared\Infrastructure\Http;

use Phex\Shared\Infrastructure\Http\Validation\ValidatorInterface;
use Psr\Http\Message\ServerRequestInterface;
use ReflectionClass;
use InvalidArgumentException;

final class SmartRequestFactory
{

    /**
     * Instantiate a DTO from the request data.
     *
     * @param ServerRequestInterface $request The request object.
     * @param string $dtoClass The class name of the DTO.
     * @param ValidatorInterface $validator The validator instance.
     * @param array $rules The validation rules.
     * @return object The instantiated DTO.
     * @throws \DateMalformedStringException
     * @throws \ReflectionException
     */
    public static function instantiate(
        ServerRequestInterface $request,
        string $dtoClass,
        ValidatorInterface $validator,
        array $rules
    ): object {

        $data = $request->getParsedBody() ?? [];

        $validator->validate($data, $rules);

        return self::hydrate($dtoClass, $data);
    }

    /**
     * Hydrate the DTO with the data from the request.
     *
     * @param string $dtoClass The class name of the DTO.
     * @param array $data The data to hydrate the DTO with.
     * @return object The hydrated DTO.
     * @throws \DateMalformedStringException
     * @throws \ReflectionException
     */
    private static function hydrate(string $dtoClass, array $data): object
    {
        $reflection = new ReflectionClass($dtoClass);
        $args = [];

        foreach ($reflection->getConstructor()?->getParameters() ?? [] as $param) {
            $name = $param->getName();
            $type = $param->getType()?->getName();

            if (!array_key_exists($name, $data)) {
                if ($param->isDefaultValueAvailable()) {
                    $args[] = $param->getDefaultValue();
                    continue;
                }

                throw new InvalidArgumentException("Missing parameter: $name");
            }

            $value = $data[$name];

            if ($type === \DateTimeImmutable::class) {
                $value = new \DateTimeImmutable($value);
            }

            $args[] = $value;
        }

        return $reflection->newInstanceArgs($args);
    }
}
