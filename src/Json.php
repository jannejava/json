<?php

namespace Eastwest\Json;

/**
 * Wrapper for json_encode() and json_decode() that throws exception on error.
 */
class Json
{
    /**
     * Encode value to JSON string.
     *
     * @param  mixed $value     Anything but resource
     * @param  int $options     @link http://php.net/manual/en/json.constants.php
     * @param  int $depth
     * @return string
     * @throws \Eastwest\Json\JsonException
     */
    public static function encode($value, int $options = 0, int $depth = 512) : string
    {
        $json = json_encode($value, $options, $depth);

        $error = json_last_error();
        if ($error !== JSON_ERROR_NONE) {
            throw JsonException::encoding($value, $error);
        }

        return $json;
    }

    /**
     * Decode JSON string.
     *
     * @param  string $json
     * @param  bool $as_array
     * @param  int $depth
     * @param  int $options     JSON_BIGINT_AS_STRING|JSON_OBJECT_AS_ARRAY - latter is redundant,
     *                          ie. has the same effect as passing true as 2nd param $as_array.
     * @return \StdClass|array
     * @throws \Eastwest\Json\JsonException
     */
    public static function decode(string $json, $as_array = false, int $depth = 512, int $options = 0)
    {
        $decoded = json_decode($json, $as_array, $depth, $options);

        $error = json_last_error();
        if ($error !== JSON_ERROR_NONE) {
            throw JsonException::decoding($json, $error);
        }

        return $decoded;
    }
}
