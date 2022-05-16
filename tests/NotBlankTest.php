<?php

use Ekut\SpatieDtoValidators\NotBlank;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class NotBlankTest extends TestCase
{
    public function testValidValue()
    {
        $validValues = [
            '0',
            [0, 1],
            true,
        ];

        foreach ($validValues as $validValue) {
            $result = (new NotBlank())->validate($validValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertTrue($result->isValid);
            $this->assertNull($result->message);
        }
    }

    public function testNullValue()
    {
        $result = (new NotBlank(true))->validate();

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);

        $result = (new NotBlank())->validate();

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertFalse($result->isValid);
        $this->assertEquals('Value can not be empty (a blank string, a blank array or false).', $result->message);
    }

    public function testInvalidValue()
    {
        $invalidValues = [
            '',
            [],
            0,
            false,
        ];

        foreach ($invalidValues as $invalidValue) {
            $result = (new NotBlank())->validate($invalidValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertFalse($result->isValid);
            $this->assertEquals('Value can not be empty (a blank string, a blank array or false).', $result->message);
        }
    }
}
