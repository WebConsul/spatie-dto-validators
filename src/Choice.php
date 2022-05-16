<?php

namespace Ekut\SpatieDtoValidators;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Choice extends AbstractBaseValidator
{
    public function __construct(private array $values)
    {
    }

    protected function hasViolation($value): bool
    {
        return !is_null($value) && !in_array($value, $this->values,true);
    }

    protected function getMessage(): string
    {
        return 'The value you selected is not a valid choice.';
    }
}
