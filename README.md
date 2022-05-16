# Set of validators for spatie/data-transfer-object package

## Installation

You can install the package via composer:

```bash
composer require ekut/spatie-dto-validators
```

* **Note**: This package only supports `php:^8.0`.

## Usage

As you can see in Spatie DTO documentation [Validation](https://github.com/spatie/data-transfer-object#validation)
chapter:

```
This package doesn't offer any specific validation functionality, 
but it does give you a way to build your own validation attributes. 
```

So, in this package we just collect set of tested validators for you can easily use it in your projects together with
Spatie DTO.

```php
use Ekut\SpatieDtoValidators\MinLength;
use Spatie\DataTransferObject\DataTransferObject;

class Foo extends DataTransferObject
{
    #[MinLength(10)]
    public ?string $property1;
    
    #[GreaterThan(10)]
    public ?int $property2;
}
```

If any of the validation will be violated, `Spatie\DataTransferObject\Exceptions\ValidationException` will be thrown
with related user-friendly text message.

## List of implemented validators

### Basic

#### Blank

```php
    #[Blank()]
```

Valid values:

* **false** (boolean)
* **0** (int)
* **[]** (empty array
* **''** (empty string)
* **""** (empty string)
* **null**


* **Note**: string **'0'** is invalid value.

#### NotBlank

```php
    #[NotBlank(true|false)]
```

Boolean argument means: is null allowed?

Invalid values:

* **false** (boolean)
* **0** (int)
* **[]** (empty array
* **''** (empty string)
* **""** (empty string)
* **null** (if null is not allowed by argument)


* **Note**: string **'0'** is valid value.

#### NotNull

```php
    #[NotNull()]
```

Only invalid value: **null**

#### IsNull

```php
    #[IsNull()]
```

Only valid value: **null**

#### IsTrue

```php
    #[IsTrue()]
```

Valid values:

* **true** (boolean)
* **1** (int)
* **'1'** (string)

#### IsFalse

```php
    #[IsFalse()]
```

Valid values:

* **false** (boolean)
* **0** (int)
* **'0'** (string)
* **null**

### Strings

#### MinLength

```php
    #[MinLength(3)]
```

Valid: 'car', 'lady', 333, etc.

Invalid: 'on', 'a', 12, 1, etc.

#### MaxLength

```php
    #[MaxLength(3)]
```

Valid: 'car', 'on', 'a', 333, 12, 1.

Invalid: 'lady', 'month', 9999, etc.

#### Email

```php
    #[Email()]
```

Valid: 'some@fake.com', 'some1@fake.com', 'some_1@fake.com', 'one.more.some@fake.com'.

Invalid: 'fake.com', 'fake@com'.

#### Url

```php
    #[Url()]
```

Valid:

* https://www.example.com,
* http://www.example.com,
* http://blog.example.com,
* http://www.example.com/product,
* http://www.example.com/products?id=1&page=2,
* http://www.example.com#up,
* http://www.site.com:8008,
* //www.site.com:8008

Invalid: 'some fake', 'www.example.com', 'example.com'

### Comparison

#### EqualTo

```php
    #[EqualTo(3)]
```

Valid values: 3, '3'.

#### NotEqualTo

```php
    #[EqualTo(3)]
```

Invalid values: 3, '3'.

#### IdenticalTo

```php
    #[IdenticalTo(3)]
```

Only valid value: 3.

#### NotIdenticalTo

```php
    #[NotIdenticalTo(3)]
```

Only invalid value: 3.

#### LessThan

```php
    #[LessThan(3)]
```

#### LessThanOrEqual

```php
    #[LessThanOrEqual(3)]
```

#### GreaterThan

```php
    #[GreaterThan(3)]
```

#### GreaterThanOrEqual

```php
    #[GreaterThanOrEqual(3)]
```

#### DivisibleBy

```php
    #[DivisibleBy(3)]
    #[DivisibleBy(0.35)]
```

### Choice

#### Choice

```php
    #[Choice([0, '1', false])]
```


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


