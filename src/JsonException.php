<?php

namespace Eastwest\Json;

class JsonException extends \RuntimeException
{
    /** @var string JSON string being decoded */
    public $decoded_json;
    public $encoded_value;

    /** @var array json_last_error() code/message map */
    public static $errors = [
        JSON_ERROR_DEPTH => 'The maximum stack depth has been exceeded',
        JSON_ERROR_STATE_MISMATCH => 'Invalid or malformed JSON',
        JSON_ERROR_CTRL_CHAR => 'Control character error, possibly incorrectly encoded',
        JSON_ERROR_SYNTAX => 'Syntax error',
        JSON_ERROR_UTF8 => 'Malformed UTF-8 characters, possibly incorrectly encoded',
        JSON_ERROR_UTF16 => 'Malformed UTF-16 characters, possibly incorrectly encoded',
        JSON_ERROR_RECURSION => 'One or more recursive references in the value to be encoded',
        JSON_ERROR_INF_OR_NAN => 'One or more NAN or INF values in the value to be encoded',
        JSON_ERROR_UNSUPPORTED_TYPE => 'Value of a type that cannot be encoded was given',
        JSON_ERROR_INVALID_PROPERTY_NAME => 'A property name that cannot be encoded was given',
    ];

    /**
     * Static constructor for decoding errors.
     *
     * @param  mixed $value
     * @param  int $code
     * @param  \Throwable $previous
     * @return \Eastwest\Json\JsonException
     */
    public static function encoding($value, int $code, $previous = null)
    {
        $e = new self(self::$errors[$code] ?? 'Unknown error', $code, $previous);
        $e->encoded_value = $value;

        return $e;
    }

    /**
     * Static constructor for decoding errors.
     *
     * @param  string $json
     * @param  int $code
     * @param  \Throwable $previous
     * @return \Eastwest\Json\JsonException
     */
    public static function decoding(string $json, int $code, $previous = null)
    {
        $e = new self(self::$errors[$code] ?? 'Unknown error', $code, $previous);
        $e->decoded_json = $json;

        return $e;
    }
}
