<?php

use Ekut\SpatieDtoValidators\GreaterThan;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class GreaterThanTest extends TestCase
{
    public function testValidValue()
    {
        $result = (new GreaterThan(5))->validate(10);

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testNullValue()
    {
        $result = (new GreaterThan(2))->validate();

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testInvalidValue()
    {
        $invalidValues = [
            1 => 1,
            2 => 1,
        ];

        foreach ($invalidValues as $comparedValue => $invalidValue) {
            $result = (new GreaterThan($comparedValue))->validate($invalidValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertFalse($result->isValid);
            $this->assertEquals("This value should be greater than $comparedValue.", $result->message);
        }
    }
}
