<?php

namespace Ekut\SpatieDtoValidators;

use Attribute;
use InvalidArgumentException;

#[Attribute(Attribute::TARGET_PROPERTY)]
class DivisibleBy extends AbstractBaseValidator
{
    public function __construct(private $divider)
    {
        if ($this->divider === 0) {
            throw new InvalidArgumentException('Argument (divider) can not be equal to 0.');
        }

        if (!is_numeric($this->divider)) {
            throw new InvalidArgumentException('Argument (divider) should be numeric.');
        }
    }

    protected function hasViolation($value): bool
    {
        if (!is_numeric($value)) {
            throw new InvalidArgumentException('Validating value should be numeric.');
        }

        if (is_int($value) && is_int($this->divider)) {
            return $value % $this->divider !== 0;
        }

        return fmod($value, $this->divider);
    }

    protected function getMessage(): string
    {
        return "This value should be a multiple of {$this->divider}.";
    }
}
