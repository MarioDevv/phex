<?php

namespace Phex\Infrastructure\Delivery\Http\Validation;

use InvalidArgumentException as ValidationError;
use Rakit\Validation\Validator;

final class RakitValidator implements ValidatorInterface
{
    public function validate(array $input, array $rules): void
    {
        $validator = new Validator();
        $validation = $validator->make($input, $rules);

        $validation->validate();

        if ($validation->fails()) {
            throw new ValidationError(json_encode($validation->errors()->all(), JSON_PRETTY_PRINT));
        }
    }
}
