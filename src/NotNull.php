<?php

namespace Ekut\SpatieDtoValidators;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class NotNull extends AbstractBaseValidator
{
    protected function hasViolation($value): bool
    {
        return null === $value;
    }

    protected function getMessage(): string
    {
        return 'This value should not be NULL.';
    }
}
