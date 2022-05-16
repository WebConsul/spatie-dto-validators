<?php

use Ekut\SpatieDtoValidators\MaxLength;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class MaxLengthTest extends TestCase
{
    public function testValidValue()
    {
        $validValues = [
            5 => '1234',
            6 => '123456',
        ];

        foreach ($validValues as $comparedValue => $validValue) {
            $result = (new MaxLength($comparedValue))->validate($validValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertTrue($result->isValid);
            $this->assertNull($result->message);
        }
    }

    public function testNullValue()
    {
        $result = (new MaxLength(2))->validate();

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testInvalidValue()
    {
        $result = (new MaxLength(2))->validate('123');

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertFalse($result->isValid);
        $this->assertEquals('Maximal length of value is 2 characters.', $result->message);
    }
}
