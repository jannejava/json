<?php

namespace Eastwest\Json;

use Illuminate\Support\ServiceProvider;

class JsonServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('json.encode.decode', function () {
            return new Json();
        });

        $this->app->alias('json.encode.decode', Json::class);
    }
}
