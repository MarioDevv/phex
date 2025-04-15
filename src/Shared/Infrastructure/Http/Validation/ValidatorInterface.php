<?php

namespace Phex\Shared\Infrastructure\Http\Validation;

interface ValidatorInterface
{
    public function validate(array $input, array $rules): void;
}
