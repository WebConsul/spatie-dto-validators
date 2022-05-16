<?php

use Ekut\SpatieDtoValidators\Url;
use PHPUnit\Framework\TestCase;
use Spatie\DataTransferObject\Validation\ValidationResult;

class UrlTest extends TestCase
{
    public function testValidValues()
    {
        $validValues = [
            'https://www.example.com',
            'http://www.example.com',
            'http://blog.example.com',
            'http://www.example.com/product',
            'http://www.example.com/products?id=1&page=2',
            'http://www.example.com#up',
            'http://www.site.com:8008',
            '//www.site.com:8008',
        ];

        foreach ($validValues as $validValue) {
            $result = (new Url())->validate($validValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertTrue($result->isValid);
            $this->assertNull($result->message);
        }
    }

    public function testNullValue()
    {
        $result = (new Url())->validate();

        $this->assertInstanceOf(ValidationResult::class, $result);
        $this->assertTrue($result->isValid);
        $this->assertNull($result->message);
    }

    public function testInvalidValue()
    {
        $invalidValues = [
            'some fake',
            0,
            'www.example.com',
            'example.com',
        ];

        foreach ($invalidValues as $invalidValue) {
            $result = (new Url())->validate($invalidValue);

            $this->assertInstanceOf(ValidationResult::class, $result);
            $this->assertFalse($result->isValid);
            $this->assertEquals('This value is not a valid URL.', $result->message);
        }
    }
}
