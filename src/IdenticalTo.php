<?php

namespace Ekut\SpatieDtoValidators;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class IdenticalTo extends AbstractBaseValidator
{
    public function __construct(private $comparedValue)
    {
    }

    protected function hasViolation($value): bool
    {
        return $value !== $this->comparedValue;
    }

    protected function getMessage(): string
    {
        return "This value should be strictly equal to {$this->comparedValue}.";
    }
}
