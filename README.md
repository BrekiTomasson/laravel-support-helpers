# laravel-support-helpers

> **NOTE** This repository has been archived due to a lack of interest in maintaining it.

Helper methods in the spirit of Laravel's native `Arr` and `Str`. Also offers a fluid `num($input)` helper method that
allows you to manipulate numeric inputs with ease.

# Installation

```shell
composer require brekitomasson/laravel-support-helpers
```

# Usage

This library can be used in three ways, all offering more or less the same features and functionality. They are:

1. Instantiating the `Number` class with an input and running methods on the variable.
2. Using the `num()` helper method.
3. Calling static methods on the `Num` class.

Note that the second option, the fluid helper method, is merely a shortcut to the first option, and the two are 
functionally interchangeable. The input is parsed and cleaned - if given as a string, the input is reduced to only 
the numeric values detected in the string. Decimal points **must** be stated with periods, as commas in the input 
string are filtered out. The string `'159,99'` will be parsed as the whole number `15999`.

```php
$number = new \BrekiTomasson\Support\Number('234.22');
$number->add(3)->over(2)->toNumber();
// = 118.61

num('234.22')->add(3)->over(2)->toNumber();
// = 118.61
```

The static methods are used internally by the library but can be called directly for simple one-off methods:

```php
use BrekiTomasson\Support\Num;

Num::percentOf(13, 49);
// = 26.530612244898
```

## Available Methods

> Note that most of these methods return an instance of `Number` and can be chained one after another. To get the 
> current result, use the `->toNumber()` method. The current value will be returned as a `float` or `int` based on 
> whether it is a whole number or not.

### `add()`

Increases the current value by the given input.

### `decimal()`

Changes the current value to only the decimal portion of the current value. If the current value is a whole number, 
replaces the current value with `0`. See `integer()` for the corresponding method. 

```php
num(234.56)->decimal()->toNumber()
// = 56
```

### `factors()`

Returns an array containing the factors of the current value (except 1 and the value itself). Requires the 
current value to be a whole number, as factors cannot be calculated from values with decimal numbers.

```php
num(39234)->factors()
// = [2, 3, 6, 13, 26, 39, 78, 503, 1006, 1509, 3018, 6539, 13078, 19617]
```

### `greaterThan()`

Returns `true` or `false` depending on if the current value is greater than the given input. See `lessThan()` for 
the corresponding method.

```php
num(39)->greaterThan(50)
// = false
```

### `inRange()`

Returns `true` or `false` depending on if the current value is within a range defined by the two given inputs.

Accepts a boolean as a third argument (defaults to `true`) to determine whether to allow exact matches with the min 
and max values in the range.

```php
num(50)->inRange(20, 80)
// = true

num(10)->inRange(5, 10, false)
// = false
```

### `integer()`

Changes the current value to only the integer portion of the current value. If the current value is a whole number,
no change is made. See `decimal()` for the corresponding method. Note that this **does not** round the current value 
to the nearest whole number.

```php
num(234.56)->integer()->toNumber()
// = 234
```

### `lessThan()`

Returns `true` or `false` depending on if the current value is less than the given input. See `greaterThan()` for the 
corresponding method.

```php
num(39)->lessThan(50)
// = true
```

### `over()`

Divides the current value by the given input.

```php
num(100)->over(5)->toNumber()
// = 20
```

### `percentOf()`

Changes the current value to how many percent of the given input it is.

```php
num(30)->percentOf(600)->toNumber()
// = 5
```

### `roundToPart()`

Rounds the current value to the given input's "parts of one". If the given input is `4`, the current value is 
rounded to the nearest `1/4`, or `.25`. If the given input is `10`, the current value is rounded to the nearest 
tenth. `->roundToPart(1)` is functionally equivalent to rounding to the nearest whole number.

```php
num(19.2342)->roundToPart(2)->toNumber()
// = 19

num(19.2342)->roundToPart(3)->toNumber()
// = 19.333333333333

num(19.2342)->roundToPart(10)->toNumber()
// = 19.2
```

### `sub()`

Reduces the current value by the given input.

### `times()`

Multiplies the current value by the given input.

### `withinRange()`

Returns `true` or `false` depending on if the current value is within a given range of a given input. The first 
argument is the base value and the second argument is the range away from the base value to test.

Accepts a boolean as a third argument (defaults to `true`) to determine whether to allow exact matches with the min
and max values in the range.

```php
num(10)->withinRange(13, 2)
// = false
// Since 10 is not within the range 11-15. 

num(19)->withinRange(15, 5)
// = true
// Since 19 is within the range 10-20.
```

# TODO

The following is a list of things that are missing or incomplete, and which will be added to the library over the 
next couple of patches/versions. None of these changes are expected to break backwards compatibility.

> PRs are always welcome! If you add a method, please update the documentation and the test suite accordingly.

- Aliases for some less obviously named methods.
  - `dividedBy()` for `over()`
  - `get()` for `toNumber()`
  - `gt()` for `greaterThan()`
  - `lt()` for `lessThan()`
  - `minus()` for `sub()`
  - `multipliedBy()` for `times()`
  - `plus()` for `add()`
- `format()` method to permit returning the value in a given format.
- `isOdd()`, `isEven()` methods.
- `isWhole()`
- `toInt()` and `toFloat()` to force cast the current value to `int` or `float`.
- `round()` method to return the value to a given number of decimal places.
  - Should return the whole number if called without arguments.
- More mathematical functions.
  - See how https://github.com/degecko/super-number/blob/master/src/SuperNumber.php uses `__call()` to reference 
    some native PHP methods. Something similar could be done here.
- "percent from" equivalent of the `percentOf()` method.
