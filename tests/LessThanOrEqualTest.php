<?php

use Ekut\SpatieDtoValidators\LessThanOrEqual;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class LessThanOrEqualTest extends TestCase
{
    public function testValidValue()
    {
        $validValues = [
            2 => 2,
            5 => 4,
            3 => '3',
        ];

        foreach ($validValues as $comparedValue => $validValue) {
            $result = (new LessThanOrEqual($comparedValue))->validate($validValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertTrue($result->isValid);
            $this->assertNull($result->message);
        }
    }

    public function testNullValue()
    {
        $result = (new LessThanOrEqual(2))->validate();

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testInvalidValue()
    {
        $invalidValues = [
            2   => 3,
            3   => '4',
            '5' => 6,
        ];

        foreach ($invalidValues as $comparedValue => $invalidValue) {
            $result = (new LessThanOrEqual($comparedValue))->validate($invalidValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertFalse($result->isValid);
            $this->assertEquals("This value should be less than or equal to $comparedValue.", $result->message);
        }
    }
}
