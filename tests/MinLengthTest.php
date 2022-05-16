<?php

use Ekut\SpatieDtoValidators\MinLength;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class MinLengthTest extends TestCase
{
    public function testValidValue()
    {
        $validValues = [
            5 => '123456',
            6 => '123456',
        ];

        foreach ($validValues as $comparedValue => $validValue) {
            $result = (new MinLength($comparedValue))->validate($validValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertTrue($result->isValid);
            $this->assertNull($result->message);
        }
    }

    public function testNullValue()
    {
        $result = (new MinLength(2))->validate();

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testInvalidValue()
    {
        $result = (new MinLength(4))->validate('123');

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertFalse($result->isValid);
        $this->assertEquals('Minimal length of value is 4 characters.', $result->message);
    }
}
