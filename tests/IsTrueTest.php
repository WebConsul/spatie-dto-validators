<?php

use Ekut\SpatieDtoValidators\IsTrue;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class IsTrueTest extends TestCase
{
    public function testValidValue()
    {
        $validValues = [
            true,
            1,
            '1',
        ];

        foreach ($validValues as $validValue) {
            $result = (new IsTrue())->validate($validValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertTrue($result->isValid);
            $this->assertNull($result->message);
        }
    }

    public function testInvalidValue()
    {
        $invalidValues = [
            false,
            null,
            0,
            2,
            '2',
        ];

        foreach ($invalidValues as $invalidValue) {
            $result = (new IsTrue())->validate($invalidValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertFalse($result->isValid);
            $this->assertEquals('This value should be true (or 1, "1").', $result->message);
        }
    }
}
