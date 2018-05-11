# Json Wrapper for Laravel

Install

```
composer require eastwest/json
```

A simple wrapper around `json_encode()` and `json_decode()` for catching any errors without executing `json_last_error()`.

```php

use Eastwest\Json\Facades\Json;

$json = Json::encode(['key' => 'value]);

```

Returned objects will be converted into associative arrays. Default is true.


```php

$array = Json::decode('{"key1":"value1","key2":"value2"}');
$array = Json::decode('{"key1":"value1","key2":"value2"}', false);

```

Execeptions imitiatly thrown. You can catch these if you want.

```php

$array = Json::decode('ASDasdASDasdASD');

// Eastwest\Json\Exceptions\EncodeDecode: Syntax error

```
