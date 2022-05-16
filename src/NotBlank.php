<?php

namespace Ekut\SpatieDtoValidators;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class NotBlank extends AbstractBaseValidator
{
    public function __construct(private bool $allowNull = false)
    {
    }

    protected function hasViolation($value): bool
    {
        if ($this->allowNull) {
            return !is_null($value) && empty($value) && '0' != $value;
        }

        return empty($value) && '0' !== $value;
    }

    protected function getMessage(): string
    {
        return 'Value can not be empty (a blank string, a blank array or false).';
    }
}
