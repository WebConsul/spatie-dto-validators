<?php

namespace Ekut\SpatieDtoValidators;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MinLength extends AbstractBaseValidator
{
    public function __construct(private int $min)
    {
    }

    protected function hasViolation($value): bool
    {
        return !is_null($value) && strlen($value) < $this->min;
    }

    protected function getMessage(): string
    {
        return "Minimal length of value is {$this->min} characters.";
    }
}
