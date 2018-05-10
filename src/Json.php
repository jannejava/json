<?php

namespace Eastwest\Json;

use Eastwest\Json\Exceptions\Depth;
use Eastwest\Json\Exceptions\EncodeDecode;

class Json
{
    public function __construct()
    {
        return $this;
    }

    public function encode($data, $pretty = false)
    {
        if ($pretty == true) {
            $json = json_encode($data, JSON_PRETTY_PRINT);
        } else {
            $json = json_encode($data);
        }

        try {
            $this->getLastError();
        } catch (EncodeDecode $e) {
            throw $e;
        }

        return $json;
    }

    public function decode($json, $assoc = true)
    {
        $data = json_decode($json, $mode);

        try {
            $this->getLastError();
        } catch (\Exception $e) {
            throw $e;
        }

        return $data;
    }

    protected function getLastError()
    {
        switch (json_last_error()) {
            case JSON_ERROR_NONE:
                return null;
                break;
            case JSON_ERROR_DEPTH:
                throw EncodeDecode::depth();
                break;

            case JSON_ERROR_STATE_MISMATCH:
                throw EncodeDecode::stateMismatch();
                break;

            case JSON_ERROR_CTRL_CHAR:
                throw EncodeDecode::ctrlChar();
                break;

            case JSON_ERROR_SYNTAX:
                throw EncodeDecode::syntax();
                break;

            case JSON_ERROR_UTF8:
                throw EncodeDecode::utf8();
                break;

            case JSON_ERROR_RECURSION:
                throw EncodeDecode::recursion();
                break;

            case JSON_ERROR_INF_OR_NAN:
                throw EncodeDecode::infOrNan();
                break;

            case JSON_ERROR_UNSUPPORTED_TYPE:
                throw EncodeDecode::unsupportedType();
                break;

            case JSON_ERROR_INVALID_PROPERTY_NAME:
                throw EncodeDecode::invalidPropertyName();
                break;

            case JSON_ERROR_UTF16:
                throw EncodeDecode::utf16();
                break;

            default:
                throw EncodeDecode::unknown();
                break;
        }
    }
}
