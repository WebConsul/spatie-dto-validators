<?php

use Ekut\SpatieDtoValidators\LessThan;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class LessThanTest extends TestCase
{
    public function testValidValue()
    {
        $result = (new LessThan(5))->validate(4);

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testNullValue()
    {
        $result = (new LessThan(2))->validate();

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testInvalidValue()
    {
        $invalidValues = [
            2    => 3,
            3    => 3,
            'ab' => 'bc',
        ];

        foreach ($invalidValues as $comparedValue => $invalidValue) {
            $result = (new LessThan($comparedValue))->validate($invalidValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertFalse($result->isValid);
            $this->assertEquals("This value should be less than $comparedValue.", $result->message);
        }
    }
}
