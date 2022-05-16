<?php

use Ekut\SpatieDtoValidators\Blank;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class BlankTest extends TestCase
{
    public function testBlankValue()
    {
        $result = (new Blank())->validate('');

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);

        $result = (new Blank())->validate();

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testNotBlankValue()
    {
        $result = (new Blank())->validate(1);

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertFalse($result->isValid);
        $this->assertEquals('Value should be empty string or null', $result->message);
    }
}
