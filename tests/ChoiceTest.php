<?php

use Ekut\SpatieDtoValidators\Choice;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class ChoiceTest extends TestCase
{
    public function testValidValue()
    {
        $result = (new Choice([1, 2, 3]))->validate(1);

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);

        $result = (new Choice(['1', 2, false]))->validate(false);

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testNullValue()
    {
        $result = (new Choice([1, 2, 3]))->validate();

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testInvalidValues()
    {
        $result = (new Choice(['1', 2, 3]))->validate(1);

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertFalse($result->isValid);
        $this->assertEquals('The value you selected is not a valid choice.', $result->message);
    }
}
