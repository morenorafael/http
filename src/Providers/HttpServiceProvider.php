<?php

namespace MorenoRafael\Http\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use MorenoRafael\Http\Request;

/**
 * Class HttpServiceProvider
 * @package MorenoRafael\Http\Providers
 */
class HttpServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton('morenorafael.http', function () {

            $client = new Client();

            return new Request($client);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        //
    }
}