<?php

use Ekut\SpatieDtoValidators\IsNull;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class IsNullTest extends TestCase
{
    public function testNullValue()
    {
        $result = (new IsNull())->validate();

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testNotNullValue()
    {
        $result = (new IsNull())->validate(false);

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertFalse($result->isValid);
        $this->assertEquals('This value should be null.', $result->message);
    }
}
