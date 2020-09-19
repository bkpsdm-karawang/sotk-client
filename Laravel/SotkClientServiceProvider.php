<?php

namespace SotkClient\Laravel;

use GuzzleHttp\Client;
use Illuminate\Support\Env;
use Illuminate\Support\ServiceProvider;
use SotkClient\ClientManager;

class SotkClientServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('sotk.client', function ($app) {
            return new ClientManager($this->createGuzzleClient());
        });
    }

    protected function createGuzzleClient()
    {
        return new Client([
            'verify' => false,
            'base_uri' => Env::get('SOTK_CLIENT_URI'),
            'auth' => [
                Env::get('SOTK_CLIENT_ID'),
                Env::get('SOTK_CLIENT_SECRET')
            ]
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['sotk.client'];
    }
}
