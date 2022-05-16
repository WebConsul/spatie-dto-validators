<?php

use Ekut\SpatieDtoValidators\IdenticalTo;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class IdenticalToTest extends TestCase
{
    public function testValidValue()
    {
        $result = (new IdenticalTo(1))->validate(1);

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testInvalidValue()
    {
        $invalidValues = [
            1 => '1',
            2 => 3,
            3 => null,
        ];

        foreach ($invalidValues as $comparedValue => $invalidValue) {
            $result = (new IdenticalTo($comparedValue))->validate($invalidValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertFalse($result->isValid);
            $this->assertEquals("This value should be strictly equal to $comparedValue.", $result->message);
        }
    }
}
