<?php

use Ekut\SpatieDtoValidators\DivisibleBy;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class DivisibleByTest extends TestCase
{
    public function testValidValue()
    {
        $validValues = [
            5      => 10,
            '0.25' => 1,
            2      => 2,
        ];

        foreach ($validValues as $divider => $validValue) {
            $result = (new DivisibleBy($divider))->validate($validValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertTrue($result->isValid);
            $this->assertNull($result->message);
        }
    }

    public function testZeroDividerValue()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Argument (divider) can not be equal to 0.');

        (new DivisibleBy(0))->validate(10);
    }

    public function testNoneNumericDividerValue()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Argument (divider) should be numeric.');

        (new DivisibleBy('Some fake'))->validate(10);
    }

    public function testNullValue()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectErrorMessage('Validating value should be numeric.');

        (new DivisibleBy(2))->validate();
    }

    public function testInvalidValue()
    {
        $invalidValues = [
            2      => 5,
            '0.25' => 1.1,
        ];

        foreach ($invalidValues as $divider => $invalidValue) {
            $result = (new DivisibleBy($divider))->validate($invalidValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertFalse($result->isValid);
            $this->assertEquals("This value should be a multiple of $divider.", $result->message);
        }
    }
}
