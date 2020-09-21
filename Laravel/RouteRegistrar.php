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
     * @param array $writable
     * @return void
     */
    public function all(array $writable = [])
    {
        $this->moduleBupati();
        $this->moduleLokasi();
        $this->modulePendidikan();
        $this->moduleSkpd($writable['skpd'] ?: false);
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

    /**
     * Register the routes for module skpd.
     *
     * @param bool $write
     * @return void
     */
    public function moduleSkpd(bool $write = false)
    {
        $this->router->group(['prefix' => 'skpd'], function($router) {
            $router->get('/unit-kerja', ['uses' => 'Skpd\UnitKerjaController@getList', 'as' => 'sotk.skpd.unit-kerja.list']);
            $router->get('/unit-kerja/{id}', ['uses' => 'Skpd\UnitKerjaController@getDetail', 'as' => 'sotk.skpd.unit-kerja.detail']);
            $router->get('/kantor-skpd', ['uses' => 'Skpd\KantorSkpdController@getList', 'as' => 'sotk.skpd.kantor-skpd.list']);
            $router->get('/kantor-skpd/{id}', ['uses' => 'Skpd\KantorSkpdController@getDetail', 'as' => 'sotk.skpd.kantor-skpd.detail']);
            $router->get('/', ['uses' => 'Skpd\SkpdController@getList', 'as' => 'sotk.skpd.list']);
            $router->get('/{id}', ['uses' => 'Skpd\SkpdController@getDetail', 'as' => 'sotk.skpd.detail']);
        });
    }
}
