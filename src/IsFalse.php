<?php

namespace Ekut\SpatieDtoValidators;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class IsFalse extends AbstractBaseValidator
{
    protected function hasViolation($value): bool
    {
        return !is_null($value) && false !== $value & 0 !== $value && '0' !== $value;
    }

    protected function getMessage(): string
    {
        return 'This value should be false (or null, 0, "0").';
    }
}
