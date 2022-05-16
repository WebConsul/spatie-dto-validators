<?php

namespace Ekut\SpatieDtoValidators;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class Email extends AbstractBaseValidator
{
    private const EMAIL_PATTERN = '/^[a-zA-Z0-9.!#$%&\'*+\\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)+$/';

    protected function hasViolation($value): bool
    {
        return !is_null($value) &&!preg_match(self::EMAIL_PATTERN, $value);
    }

    protected function getMessage(): string
    {
        return 'This value is not a valid email address.';
    }
}
