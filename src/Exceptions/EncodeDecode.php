<?php

namespace Eastwest\Json\Exceptions;

use Exception;

class EncodeDecode extends Exception
{
    public static function depth() : self
    {
        return new static('The maximum stack depth has been exceeded');
    }

    public static function stateMismatch() : self
    {
        return new static('Invalid or malformed JSON');
    }

    public static function ctrlChar() : self
    {
        return new static('Control character error, possibly incorrectly encoded');
    }

    public static function syntax() : self
    {
        return new static('Syntax error');
    }

    public static function utf8() : self
    {
        return new static('Malformed UTF-8 characters, possibly incorrectly encoded');
    }

    public static function recursion() : self
    {
        return new static('One or more recursive references in the value to be encoded');
    }

    public static function infOrNan() : self
    {
        return new static('One or more NAN or INF values in the value to be encoded');
    }

    public static function unsupportedType() : self
    {
        return new static('A value of a type that cannot be encoded was given');
    }

    public static function invalidPropertyName() : self
    {
        return new static('A property name that cannot be encoded was given');
    }

    public static function utf16() : self
    {
        return new static('Malformed UTF-16 characters, possibly incorrectly encoded');
    }

    public static function unknown() : self
    {
        return new static('Unknown error');
    }
}
