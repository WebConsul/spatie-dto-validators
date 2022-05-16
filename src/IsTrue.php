<?php

namespace Ekut\SpatieDtoValidators;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class IsTrue extends AbstractBaseValidator
{
    protected function hasViolation($value): bool
    {
        return true !== $value && 1 !== $value && '1' !== $value;
    }

    protected function getMessage(): string
    {
        return 'This value should be true (or 1, "1").';
    }
}
