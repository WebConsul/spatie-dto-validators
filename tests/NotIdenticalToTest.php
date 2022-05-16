<?php

use Ekut\SpatieDtoValidators\NotIdenticalTo;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class NotIdenticalToTest extends TestCase
{
    public function testValidValue()
    {
        $validValues = [
            1 => '1',
            2 => 1,
        ];

        foreach ($validValues as $comparedValue => $validValue) {
            $result = (new NotIdenticalTo($comparedValue))->validate($validValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertTrue($result->isValid);
            $this->assertNull($result->message);
        }
    }

    public function testNullValue()
    {
        $result = (new NotIdenticalTo(1))->validate();

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testInvalidValue()
    {
        $result = (new NotIdenticalTo(1))->validate(1);

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertFalse($result->isValid);
        $this->assertEquals('This value should not be strictly equal to 1.', $result->message);
    }
}
