<?php

namespace Phex\Infrastructure\Delivery\Http\Validation;

interface ValidatorInterface
{
    public function validate(array $input, array $rules): void;
}
