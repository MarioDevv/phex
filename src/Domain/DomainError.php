<?php

namespace Phex\Domain;

use DomainException;

abstract class DomainError extends DomainException
{

    public function __construct()
    {
        parent::__construct($this->errorMessage());
    }

    abstract protected function errorMessage(): string;
}
