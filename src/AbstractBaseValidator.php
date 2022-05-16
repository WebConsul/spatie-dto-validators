<?php

namespace Ekut\SpatieDtoValidators;

use Spatie\DataTransferObject\Validation\ValidationResult;
use Spatie\DataTransferObject\Validator;

abstract class AbstractBaseValidator implements Validator
{
    public function validate(mixed $value = null): ValidationResult
    {
        if ($this->hasViolation($value)) {
            return ValidationResult::invalid($this->getMessage());
        }

        return ValidationResult::valid();
    }

    abstract protected function hasViolation($value): bool;

    abstract protected function getMessage(): string;
}
