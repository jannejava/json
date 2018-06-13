<?php

namespace Eastwest\Json\Tests;

use Eastwest\Json\Json;
use PHPUnit\Framework\TestCase;

class JsonTest extends TestCase
{
    /** @test */
    public function decodes_valid_json()
    {
        $this->assertEquals((object) ['key' => 'value'], Json::decode('{"key":"value"}'));
        $this->assertSame(['key' => 'value'], Json::decode('{"key":"value"}', true));
    }

    /** @test */
    public function encodes_json()
    {
        $this->assertSame('{"key":"value"}', Json::encode(['key' => 'value']));
    }

    /**
     * @test
     * @expectedException \Eastwest\Json\JsonException
     * @expectedExceptionCode JSON_ERROR_SYNTAX
     * @expectedExceptionMessage Syntax error
     */
    public function throws_exception_with_code_and_message_upon_decoding_error()
    {
        Json::decode('{faulty json}');
    }

    /**
     * @test
     * @expectedException \Eastwest\Json\JsonException
     * @expectedExceptionCode JSON_ERROR_UNSUPPORTED_TYPE
     * @expectedExceptionMessage Value of a type that cannot be encoded was given
     */
    public function throws_exception_with_code_and_message_upon_encoding_error()
    {
        Json::encode(tmpfile());
    }
}
