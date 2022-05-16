<?php

namespace Ekut\SpatieDtoValidators;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class EqualTo extends AbstractBaseValidator
{
    public function __construct(private $comparedValue)
    {
    }

    protected function hasViolation($value): bool
    {
        return $value != $this->comparedValue;
    }

    protected function getMessage(): string
    {
        return "This value should be equal to {$this->comparedValue}.";
    }
}
