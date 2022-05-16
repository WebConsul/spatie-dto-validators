<?php

use Ekut\SpatieDtoValidators\NotNull;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class NotNullTest extends TestCase
{
    public function testNotNullValue()
    {
        $validValues = [
            1,
            false,
            '',
            0,
        ];

        foreach ($validValues as $validValue) {
            $result = (new NotNull())->validate($validValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertTrue($result->isValid);
            $this->assertNull($result->message);
        }
    }

    public function testInvalidValue()
    {
        $result = (new NotNull())->validate();

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertFalse($result->isValid);
        $this->assertEquals('This value should not be NULL.', $result->message);
    }
}
