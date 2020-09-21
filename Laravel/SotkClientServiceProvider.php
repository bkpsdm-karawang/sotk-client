<?php

namespace SotkClient\Laravel;

use GuzzleHttp\Client;
use Illuminate\Config\Repository as Config;
use Illuminate\Support\ServiceProvider;
use SotkClient\ClientManager;

class SotkClientServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config.php' => config_path('sotk.php'),
            ], 'sotk-config');
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config.php', 'sotk');
        $config = $this->app->make(Config::class)->get('sotk');

        $this->app->singleton('sotk.client', function () use ($config) {
            return new ClientManager($this->createGuzzleClient($config));
        });

        $this->app->singleton('sotk.route', function () use ($config) {
            return new Router($config);
        });
    }

    /**
     * create guzzle client
     *
     * @param array $config
     * @return \GuzzleHttp\Client
     */
    protected function createGuzzleClient(array $config)
    {
        return new Client([
            'verify' => false,
            'base_uri' => $config['client_uri'],
            'auth' => [
                $config['client_id'],
                $config['client_secret']
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
        return [
            'sotk.client',
            'sotk.route'
        ];
    }
}
