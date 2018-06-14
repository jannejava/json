# Wrap JSON encoding/decoding errors in exception

A simple wrapper around `json_encode()` and `json_decode()` for catching any errors without executing `json_last_error()`.

```php

use Eastwest\Json\Json;
use Eastwest\Json\JsonException;

try {
    $json = Json::encode(['key' => 'value']);
} catch (JsonException $e) {
    // code and message will match json_last_error() values:
    // @link http://php.net/manual/en/function.json-last-error.php#refsect1-function.json-last-error-returnvalues 
    echo $e->getMessage();
    echo $e->getCode();
}
```
