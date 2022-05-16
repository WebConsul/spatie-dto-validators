<?php

namespace Ekut\SpatieDtoValidators;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class LessThan extends AbstractBaseValidator
{
    public function __construct(private $comparedValue)
    {
    }

    protected function hasViolation($value): bool
    {
        return !is_null($value) && $value >= $this->comparedValue;
    }

    protected function getMessage(): string
    {
        return "This value should be less than {$this->comparedValue}.";
    }
}
