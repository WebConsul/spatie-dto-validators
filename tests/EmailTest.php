<?php

use Ekut\SpatieDtoValidators\Email;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class EmailTest extends TestCase
{
    public function testValidValue()
    {
        $validValues = [
            'some@fake.com',
            'some1@fake.com',
            'some_1@fake.com',
            'one.more.some@fake.com',
        ];

        foreach ($validValues as $validValue) {
            $result = (new Email())->validate($validValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertTrue($result->isValid);
            $this->assertNull($result->message);
        }
    }

    public function testNullValue()
    {
        $result = (new Email())->validate();

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testInvalidValue()
    {
        $invalidValues = [
            'fake.com',
            0,
            'fake@com',
        ];

        foreach ($invalidValues as $invalidValue) {
            $result = (new Email())->validate($invalidValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertFalse($result->isValid);
            $this->assertEquals('This value is not a valid email address.', $result->message);
        }
    }
}
