<?php

use Ekut\SpatieDtoValidators\NotEqualTo;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class NotEqualToTest extends TestCase
{
    public function testValidValue()
    {
        $result = (new NotEqualTo(1))->validate(2);

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testNullValue()
    {
        $result = (new NotEqualTo(1))->validate();

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testInvalidValue()
    {
        $invalidValues = [
            1 => 1,
            2 => '2',
        ];

        foreach ($invalidValues as $comparedValue => $invalidValue) {
            $result = (new NotEqualTo($comparedValue))->validate($invalidValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertFalse($result->isValid);
            $this->assertEquals("This value should not be equal to $comparedValue.", $result->message);
        }
    }
}
