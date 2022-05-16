<?php

use Ekut\SpatieDtoValidators\IsFalse;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class IsFalseTest extends TestCase
{
    public function testValidValue()
    {
        $validValues = [
            false,
            null,
            0,
            '0',
        ];

        foreach ($validValues as $validValue) {
            $result = (new IsFalse())->validate($validValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertTrue($result->isValid);
            $this->assertNull($result->message);
        }
    }

    public function testInvalidValue()
    {
        $invalidValues = [
            true,
            1,
            '1',
        ];

        foreach ($invalidValues as $invalidValue) {
            $result = (new IsFalse())->validate($invalidValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertFalse($result->isValid);
            $this->assertEquals('This value should be false (or null, 0, "0").', $result->message);
        }
    }
}
