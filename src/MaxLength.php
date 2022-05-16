<?php

namespace Ekut\SpatieDtoValidators;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class MaxLength extends AbstractBaseValidator
{
    public function __construct(private int $max) {
    }

    protected function hasViolation($value): bool
    {
        return strlen($value) > $this->max;
    }

    protected function getMessage(): string
    {
        return "Maximal length of value is {$this->max} characters.";
    }
}
