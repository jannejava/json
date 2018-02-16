<?php

namespace Eastwest\Json;

//use Eastwest\Publisher\Facades\Publisher;
use Eastwest\Json\Facades as JsonFacade;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class JsonServiceProvider extends ServiceProvider
{
    public function register()
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('Json', JsonFacade::class);

        $this->app->singleton('json', function () {
            return new Json();
        });
    }
}
