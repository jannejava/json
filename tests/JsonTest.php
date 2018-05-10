<?php

namespace Eastwest\Json\Tests;

use Eastwest\Json\Facades\Json;
use Eastwest\Json\Exceptions\EncodeDecode;


class JsonTest extends TestCase
{
    public function test_valid_json_is_returned() {
        $json = Json::encode(['key1' => 'value1', 'key2' => 'value2']);
        $this->assertEquals('{"key1":"value1","key2":"value2"}', $json);
    }

    public function test_valid_array_from_json_returned() { 
        $array = Json::decode('{"key1":"value1","key2":"value2"}');
        $this->assertEquals(['key1' => 'value1', 'key2' => 'value2'],$array);
    }

    public function test_syntax_error_json() {
        $this->expectException(EncodeDecode::class);
        $array = Json::decode('asdflue2"}');
    }
}