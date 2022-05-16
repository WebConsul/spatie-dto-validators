<?php

namespace Ekut\SpatieDtoValidators;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class IsNull extends AbstractBaseValidator
{
    protected function hasViolation($value): bool
    {
        return !is_null($value);
    }

    protected function getMessage(): string
    {
        return 'This value should be null.';
    }
}
