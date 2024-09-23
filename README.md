# ParseBool

`ParseBool` is a PHP class designed to facilitate the parsing and validation of boolean values from various input types. It simplifies the process of interpreting values that can be represented as true or false, making your code cleaner and more reliable.

## Purpose

The primary purpose of the `ParseBool` class is to convert different data types—such as strings, numbers, and booleans—into a consistent boolean output (`true` or `false`). This is particularly useful when dealing with user input or data from external sources, where the representation of boolean values can vary.

## Installation

You can include the `ParseBool` class in your project by copying the `ParseBool.php` file into your desired directory. 

## Usage

### Parsing and Casting value into Boolean

To use the `ParseBool` class, simply call the `parseBool` method with your value as an argument. 

### Example

```php
use Techins\ParseBool\ParseBool;

$value1 = ParseBool::parseBool('yes');  // Returns true
$value2 = ParseBool::parseBool(0);       // Returns false
$value3 = ParseBool::parseBool(true);    // Returns true
$value4 = ParseBool::parseBool('off');    // Returns false

$value4 = ParseBool::parseBool('dfsafsdfsdfds');    // Returns false
$value4 = ParseBool::parseBool('dfsafsdfsdfds',true);    // Throws exception look bellow

```

### Strict checking
Upon strinct checking if the provided value cannot be interpreted as a boolean, a `ValueNotBooleanOneException` will be thrown. You should wrap your calls in a try-catch block to handle this exception gracefully:

```php
try {
    // Checklbox Value
    $input = $_POST['checkbox_val'];
    $result = ParseBool::parseBool($input,true);
} catch (ValueNotBooleanOneException $e) {
    // Handle the exception
}
```



#### Input validation
You can also validate a boolean value (for example if value is a checked checkbox)

```
$value1 = ParseBool::validateBooleableValue('yes');  // Returns true
$value2 = ParseBool::validateBooleableValue(0);       // Returns true
$value3 = ParseBool::validateBooleableValue(true);    // Returns true
$value4 = ParseBool::validateBooleableValue('off');    // Returns true
$value3 = ParseBool::validateBooleableValue(false);    // Returns true
$value3 = ParseBool::validateBooleableValue('true');    // Returns true


$value5 = ParseBool::validateBooleableValue('ddsasadsa');  // Returns false
$value6 = ParseBool::validateBooleableValue(-1);       // Returns false
$value6 = ParseBool::validateBooleableValue("");       // Returns false

```

## Valid Boolean Values

The following values are considered valid and will be converted to `true`:

- `1`
- `true`
- `'on'`
- `'yes'`
- `'true'`

The following values are considered valid and will be converted to `false`:

- `0`
- `false`
- `'off'`
- `'no'`
- `'false'`
- `f`

Any other values will result in a `ValueNotBooleanOneException`.


## Usage upon checkboxes

Assuming we have thius form

```
<form method = "POST" action="/myscript.php">
    <input type="checkbox" name="check">
</form>

```

You can use `validateBooleableValue` to validate whether checkbox is checked.

```

$checked = ParseBool::parseBool($_POST['check']??false);

```

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contributing

Contributions are welcome! Please submit a pull request or open an issue for any enhancements or bug fixes.
