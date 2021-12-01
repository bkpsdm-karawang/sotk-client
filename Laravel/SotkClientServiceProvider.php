<?php

namespace SotkClient\Laravel;

use GuzzleHttp\Client;
use SotkClient\Laravel\Rules\IdEselonRule;
use SotkClient\Laravel\Rules\IdGolonganRule;
use SotkClient\Laravel\Rules\IdJabatanRule;
use SotkClient\Laravel\Rules\IdSkpdRule;
use SotkClient\Laravel\Rules\IdUnitKerjaRule;
use Illuminate\Config\Repository as Config;
use Illuminate\Support\ServiceProvider;
use SotkClient\ClientManager;
use Illuminate\Support\Facades\Validator;

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

        $this->registerCustomValidator();
    }

    /**
     * register all custom validation
     *
     * @return void
     */
    protected function registerCustomValidator()
    {
        $idSkpd = new IdSkpdRule();
        Validator::extend('id_skpd', function ($attribute, $value) use ($idSkpd) {
            return $idSkpd->passes($attribute, $value);
        }, $idSkpd->message());

        $idUnitKerja = new IdUnitKerjaRule();
        Validator::extend('id_unit_kerja', function ($attribute, $value) use ($idUnitKerja) {
            return $idUnitKerja->passes($attribute, $value);
        }, $idUnitKerja->message());

        $idJabatan = new IdJabatanRule();
        Validator::extend('id_jabatan', function ($attribute, $value) use ($idJabatan) {
            return $idJabatan->passes($attribute, $value);
        }, $idJabatan->message());

        $idGolongan = new IdGolonganRule();
        Validator::extend('id_golongan', function ($attribute, $value) use ($idGolongan) {
            return $idGolongan->passes($attribute, $value);
        }, $idGolongan->message());

        $idEselon = new IdEselonRule();
        Validator::extend('id_eselon', function ($attribute, $value) use ($idEselon) {
            return $idEselon->passes($attribute, $value);
        }, $idEselon->message());
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();
        $config = config('sotk');

        $this->app->singleton('sotk.client', function () use ($config) {
            return new ClientManager($this->createGuzzleClient($config));
        });

        $this->app->singleton('sotk.route', function () use ($config) {
            return new Router($config);
        });
    }

    /**
     * apply configuration.
     */
    protected function configure()
    {
        if (method_exists($this->app, 'configure')) {
            $this->app->configure('sotk');
        }

        $path = realpath(__DIR__.'/config.php');
        $this->mergeConfigFrom($path, 'sotk');
    }

    /**
     * create guzzle client
     *
     * @param array $config
     * @return \GuzzleHttp\Client
     */
    protected function createGuzzleClient(array $config): Client
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
