<?php

use Ekut\SpatieDtoValidators\GreaterThanOrEqual;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class GreaterThanOrEqualTest extends TestCase
{
    public function testValidValue()
    {
        $result = (new GreaterThanOrEqual(5))->validate(10);

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);

        $result = (new GreaterThanOrEqual(2))->validate(2);

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testNullValue()
    {
        $result = (new GreaterThanOrEqual(2))->validate();

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testInvalidValue()
    {
        $result = (new GreaterThanOrEqual(2))->validate(1);

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertFalse($result->isValid);
        $this->assertEquals('This value should be greater than or equal to 2.', $result->message);
    }
}
