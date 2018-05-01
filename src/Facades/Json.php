<?php

namespace Eastwest\Json\Facades;

use Illuminate\Support\Facades\Facade;

class Json extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'json.encode.decode';
    }
}
