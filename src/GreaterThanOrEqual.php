<?php

namespace Ekut\SpatieDtoValidators;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class GreaterThanOrEqual extends AbstractBaseValidator
{
    public function __construct(private $comparedValue)
    {
    }

    protected function hasViolation($value): bool
    {
        return !is_null($value) && $value < $this->comparedValue;
    }

    protected function getMessage(): string
    {
        return "This value should be greater than or equal to {$this->comparedValue}.";
    }
}
