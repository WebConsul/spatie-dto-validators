<?php

namespace Ekut\SpatieDtoValidators;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Blank extends AbstractBaseValidator
{
    protected function hasViolation($value): bool
    {
        return !empty($value) && '0' !== $value;
    }

    protected function getMessage(): string
    {
        return 'Value should be empty string or null';
    }
}
