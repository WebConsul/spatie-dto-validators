<?php

use Ekut\SpatieDtoValidators\EqualTo;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class EqualToTest extends TestCase
{
    public function testValidValue()
    {
        $validValues = [
            0 => false,
            1 => 1,
            2 => '2',
        ];

        foreach ($validValues as $comparedValue => $validValue) {
            $result = (new EqualTo($comparedValue))->validate($validValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertTrue($result->isValid);
            $this->assertNull($result->message);
        }
    }

    public function testInvalidValue()
    {
        $invalidValues = [
            0 => true,
            1 => 2,
            2 => null,
        ];

        foreach ($invalidValues as $comparedValue => $invalidValue) {
            $result = (new EqualTo($comparedValue))->validate($invalidValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertFalse($result->isValid);
            $this->assertEquals("This value should be equal to $comparedValue.", $result->message);
        }
    }
}
