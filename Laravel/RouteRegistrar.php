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
        $this->moduleLokasi();
        $this->modulePendidikan();
        $this->moduleSkpd();
        $this->moduleJabatan($writable['jabatan'] ?: false);
    }

    /**
     * Register the routes for module lokasi.
     *
     * @return void
     */
    public function moduleLokasi()
    {
        $this->router->group(['prefix' => 'lokasi'], function ($router) {
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
        $this->router->group(['prefix' => 'pendidikan'], function ($router) {
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
     * @return void
     */
    public function moduleSkpd()
    {
        $this->router->group(['prefix' => 'skpd'], function ($router) {
            $router->get('/unit-kerja', ['uses' => 'Skpd\UnitKerjaController@getList', 'as' => 'sotk.skpd.unit-kerja.list']);
            $router->get('/unit-kerja/{id}', ['uses' => 'Skpd\UnitKerjaController@getDetail', 'as' => 'sotk.skpd.unit-kerja.detail']);
            $router->get('/kantor-skpd', ['uses' => 'Skpd\KantorSkpdController@getList', 'as' => 'sotk.skpd.kantor-skpd.list']);
            $router->get('/kantor-skpd/{id}', ['uses' => 'Skpd\KantorSkpdController@getDetail', 'as' => 'sotk.skpd.kantor-skpd.detail']);
            $router->get('/', ['uses' => 'Skpd\SkpdController@getList', 'as' => 'sotk.skpd.list']);
            $router->get('/{id}', ['uses' => 'Skpd\SkpdController@getDetail', 'as' => 'sotk.skpd.detail']);
        });
    }
    /**
     * Register the routes for module jabatan.
     *
     * @param bool $write
     * @return void
     */
    public function moduleJabatan(bool $write = false)
    {
        $this->router->group(['prefix' => 'jabatan'], function ($router) {

            $router->get('/politik', ['uses' => 'Jabatan\JabatanPolitikController@getList', 'as' => 'sotk.jabatan.politik.list']);
            $router->get('/politik/{id}', ['uses' => 'Jabatan\JabatanPolitikController@getDetail', 'as' => 'sotk.jabatan.politik.detail']);

            $router->get('/struktural', ['uses' => 'Jabatan\JabatanStrukturalController@getList', 'as' => 'sotk.jabatan.struktural.list']);
            $router->get('/struktural/{id}', ['uses' => 'Jabatan\JabatanStrukturalController@getDetail', 'as' => 'sotk.jabatan.struktural.detail']);

            $router->group(['prefix' => 'fungsional'], function ($router) {
                $router->get('/jenis', ['uses' => 'Jabatan\JabatanFungsionalJenisController@getList', 'as' => 'sotk.jabatan.jenis.fungsional.list']);
                $router->get('/jenis/{id}', ['uses' => 'Jabatan\JabatanFungsionalJenisController@getDetail', 'as' => 'sotk.jabatan.jenis.fungsional.detail']);
                $router->get('/', ['uses' => 'Jabatan\JabatanFungsionalController@getList', 'as' => 'sotk.jabatan.fungsional.list']);
                $router->get('/{id}', ['uses' => 'Jabatan\JabatanFungsionalController@getDetail', 'as' => 'sotk.jabatan.fungsional.detail']);
            });

            $router->group(['prefix' => 'pelaksana'], function ($router) {
                $router->get('/jenis', ['uses' => 'Jabatan\JabatanPelaksanaJenisController@getList', 'as' => 'sotk.jabatan.jenis.pelaksana.list']);
                $router->get('/jenis/{id}', ['uses' => 'Jabatan\JabatanPelaksanaJenisController@getDetail', 'as' => 'sotk.jabatan.jenis.pelaksana.detail']);
                $router->get('/', ['uses' => 'Jabatan\JabatanPelaksanaController@getList', 'as' => 'sotk.jabatan.pelaksana.list']);
                $router->get('/{id}', ['uses' => 'Jabatan\JabatanPelaksanaController@getDetail', 'as' => 'sotk.jabatan.pelaksana.detail']);
            });

            $router->get('/tugas-tambahan', ['uses' => 'Jabatan\JabatanTugasTambahanController@getList', 'as' => 'sotk.jabatan.tugas-tambahan.list']);
            $router->get('/tugas-tambahan/{id}', ['uses' => 'Jabatan\JabatanTugasTambahanController@getDetail', 'as' => 'sotk.jabatan.tugas-tambahan.detail']);

            $router->get('/eselon', ['uses' => 'Jabatan\JabatanEselonController@getList', 'as' => 'sotk.jabatan.eselon.list']);
            $router->get('/eselon/{id}', ['uses' => 'Jabatan\JabatanEselonController@getDetail', 'as' => 'sotk.jabatan.eselon.detail']);

            $router->get('/golongan', ['uses' => 'Jabatan\JabatanGolonganController@getList', 'as' => 'sotk.jabatan.golongan.list']);
            $router->get('/golongan/{id}', ['uses' => 'Jabatan\JabatanGolonganController@getDetail', 'as' => 'sotk.jabatan.golongan.detail']);

            $router->get('/kelas', ['uses' => 'Jabatan\JabatanKelasController@getList', 'as' => 'sotk.jabatan.kelas.list']);
            $router->get('/kelas/{id}', ['uses' => 'Jabatan\JabatanKelasController@getDetail', 'as' => 'sotk.jabatan.kelas.detail']);

            $router->get('/', ['uses' => 'Jabatan\JabatanController@getList', 'as' => 'sotk.jabatan.list']);
            $router->get('/{id}', ['uses' => 'Jabatan\JabatanController@getDetail', 'as' => 'sotk.jabatan.detail']);
        });
    }
}
