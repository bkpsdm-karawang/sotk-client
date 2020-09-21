<?php

namespace SotkClient\Laravel;

use Illuminate\Contracts\Routing\Registrar as Router;

class RouteRegistrar
{
    /**
     * The router implementation.
     *
     * @var \Illuminate\Contracts\Routing\Registrar
     */
    protected $router;

    /**
     * Create a new route registrar instance.
     *
     * @param  \Illuminate\Contracts\Routing\Registrar  $router
     * @return void
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Register routes for transient tokens, clients, and personal access tokens.
     *
     * @return void
     */
    public function all()
    {
        $this->moduleBupati();
        $this->moduleLokasi();
        $this->modulePendidikan();
    }

    /**
     * Register the routes for module bupati.
     *
     * @return void
     */
    public function moduleBupati()
    {
        $this->router->get('/bupati', ['uses' => 'BupatiController@getList', 'as' => 'sotk.bupati.list']);
        $this->router->get('/bupati/{id}', ['uses' => 'BupatiController@getDetail', 'as' => 'sotk.bupati.detail']);
    }

    /**
     * Register the routes for module lokasi.
     *
     * @return void
     */
    public function moduleLokasi()
    {
        $this->router->group(['prefix' => 'lokasi'], function($router) {
            $router->get('/provinsi', ['uses' => 'Lokasi\ProvinsiController@getList', 'as' => 'sotk.lokasi.provinsi.list']);
            $router->get('/provinsi/{id}', ['uses' => 'Lokasi\ProvinsiController@getDetail', 'as' => 'sotk.lokasi.provinsi.detail']);
            $router->get('/kabupaten', ['uses' => 'Lokasi\KabupatenController@getList', 'as' => 'sotk.lokasi.kabupaten.list']);
            $router->get('/kabupaten/{id}', ['uses' => 'Lokasi\KabupatenController@getDetail', 'as' => 'sotk.lokasi.kabupaten.detail']);
            $router->get('/kecamatan', ['uses' => 'Lokasi\KecamatanController@getList', 'as' => 'sotk.lokasi.kecamatan.list']);
            $router->get('/kecamatan/{id}', ['uses' => 'Lokasi\KecamatanController@getDetail', 'as' => 'sotk.lokasi.kecamatan.detail']);
            $router->get('/desa', ['uses' => 'Lokasi\DesaController@getList', 'as' => 'sotk.lokasi.desa.list']);
            $router->get('/desa/{id}', ['uses' => 'Lokasi\DesaController@getDetail', 'as' => 'sotk.lokasi.desa.detail']);
        });
    }

    /**
     * Register the routes for module pendidikan.
     *
     * @return void
     */
    public function modulePendidikan()
    {
        $this->router->group(['prefix' => 'pendidikan'], function($router) {
            $router->get('/jenjang', ['uses' => 'Pendidikan\JenjangController@getList', 'as' => 'sotk.pendidikan.jenjang.list']);
            $router->get('/jenjang/{id}', ['uses' => 'Pendidikan\JenjangController@getDetail', 'as' => 'sotk.pendidikan.jenjang.detail']);
            $router->get('/jurusan', ['uses' => 'Pendidikan\JurusanController@getList', 'as' => 'sotk.pendidikan.jurusan.list']);
            $router->get('/jurusan/{id}', ['uses' => 'Pendidikan\JurusanController@getDetail', 'as' => 'sotk.pendidikan.jurusan.detail']);
            $router->get('/perguruan-tinggi', ['uses' => 'Pendidikan\PerguruanTinggiController@getList', 'as' => 'sotk.pendidikan.perguruan-tinggi.list']);
            $router->get('/perguruan-tinggi/{id}', ['uses' => 'Pendidikan\PerguruanTinggiController@getDetail', 'as' => 'sotk.pendidikan.perguruan-tinggi.detail']);
        });
    }
}
