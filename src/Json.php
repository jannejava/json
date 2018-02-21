<?php

namespace Eastwest\Json;

use Eastwest\Json\Exceptions\JsonEncodeDecodeException;
use Eastwest\Json\Exceptions\JsonErrorCtrlCharException;
use Eastwest\Json\Exceptions\JsonErrorDepthException;
use Eastwest\Json\Exceptions\JsonErrorMalformedUft8Exception;
use Eastwest\Json\Exceptions\JsonErrorStateMismatchException;
use Eastwest\Json\Exceptions\JsonErrorSyntaxException;
use Eastwest\Json\Exceptions\JsonErrorUnknownException;


class Json {

	public function __construct() 
	{
		return $this;
	}

	public function encode($data) 
	{
		$json = json_encode($data);
		
		try {
			$this->getLastError();
		} catch (JsonEncodeDecodeException $e) {
			throw $e;
		}

		return $json;
	}

	public function decode($json, $mode = true) 
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
	            throw new JsonErrorDepthException();
	        	break;
	        case JSON_ERROR_STATE_MISMATCH:
	           throw new JsonErrorStateMismatchException();
	        	break;
	        case JSON_ERROR_CTRL_CHAR:
	            throw new JsonErrorCtrlCharException();
	        	break;
	        case JSON_ERROR_SYNTAX:
	            throw new JsonErrorSyntaxException();
	        	break;
	        case JSON_ERROR_UTF8:
	        	throw new JsonErrorMalformedUft8Exception();
	        	break;
	        default:
	            throw new JsonErrorUnknownException();
	        	break;
	    }
	}
}