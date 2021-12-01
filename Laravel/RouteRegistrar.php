<?php

namespace SotkClient\Laravel;

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
    public function __construct($router)
    {
        $this->router = $router;
    }

    /**
     * Register routes for transient tokens, clients, and personal access tokens.
     * @return void
     */
    public function all()
    {
        $this->moduleLokasi();
        $this->modulePendidikan();
        $this->moduleSkpd();
        $this->moduleJabatan();
    }

    /**
     * create group route
     */
    protected function createGroup($prefix, $middleware = null): array
    {
        $group = ['prefix' => $prefix];

        if (!is_null($middleware)) {
            $group['middleware'] = $middleware;
        }

        return $group;
    }

    /**
     * Register the routes for module lokasi.
     *
     * @param mixed $middleware string|array
     * @return void
     */
    public function moduleLokasi($middleware = null)
    {
        $this->router->group($this->createGroup('lokasi', $middleware), function ($router) {
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
     * @param mixed $middleware string|array
     * @return void
     */
    public function modulePendidikan($middleware = null)
    {
        $this->router->group($this->createGroup('pendidikan', $middleware), function ($router) {
            $router->get('/tingkat', ['uses' => 'Pendidikan\TingkatController@getList', 'as' => 'sotk.pendidikan.tingkat.list']);
            $router->get('/tingkat/{id}', ['uses' => 'Pendidikan\TingkatController@getDetail', 'as' => 'sotk.pendidikan.tingkat.detail']);
            $router->get('/satuan', ['uses' => 'Pendidikan\SatuanController@getList', 'as' => 'sotk.pendidikan.satuan.list']);
            $router->get('/satuan/{id}', ['uses' => 'Pendidikan\SatuanController@getDetail', 'as' => 'sotk.pendidikan.satuan.detail']);
            $router->get('/jurusan', ['uses' => 'Pendidikan\JurusanController@getList', 'as' => 'sotk.pendidikan.jurusan.list']);
            $router->get('/jurusan/{id}', ['uses' => 'Pendidikan\JurusanController@getDetail', 'as' => 'sotk.pendidikan.jurusan.detail']);
            $router->get('/lembaga', ['uses' => 'Pendidikan\LembagaController@getList', 'as' => 'sotk.pendidikan.lembaga.list']);
            $router->get('/lembaga/{id}', ['uses' => 'Pendidikan\LembagaController@getDetail', 'as' => 'sotk.pendidikan.lembaga.detail']);
            $router->get('/sekolah', ['uses' => 'Pendidikan\SekolahController@getList', 'as' => 'sotk.pendidikan.sekolah.list']);
            $router->get('/sekolah/{id}', ['uses' => 'Pendidikan\SekolahController@getDetail', 'as' => 'sotk.pendidikan.sekolah.detail']);
            $router->get('/perguruan-tinggi', ['uses' => 'Pendidikan\PerguruanTinggiController@getList', 'as' => 'sotk.pendidikan.perguruan-tinggi.list']);
            $router->get('/perguruan-tinggi/{id}', ['uses' => 'Pendidikan\PerguruanTinggiController@getDetail', 'as' => 'sotk.pendidikan.perguruan-tinggi.detail']);
        });
    }

    /**
     * Register the routes for module skpd.
     *
     * @param mixed $middleware string|array
     * @return void
     */
    public function moduleSkpd($middleware = null)
    {
        $this->router->group($this->createGroup('skpd', $middleware), function ($router) {
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
     * @param mixed $middleware string|array
     * @return void
     */
    public function moduleJabatan($middleware = null)
    {
        $this->router->group($this->createGroup('jabatan', $middleware), function ($router) {
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

            $router->get('/tingkat', ['uses' => 'Jabatan\TingkatController@getList', 'as' => 'sotk.jabatan.tingkat.list']);
            $router->get('/tingkat/{id}', ['uses' => 'Jabatan\TingkatController@getDetail', 'as' => 'sotk.jabatan.tingkat.detail']);

            $router->get('/eselon', ['uses' => 'Jabatan\EselonController@getList', 'as' => 'sotk.jabatan.eselon.list']);
            $router->get('/eselon/{id}', ['uses' => 'Jabatan\EselonController@getDetail', 'as' => 'sotk.jabatan.eselon.detail']);

            $router->get('/golongan', ['uses' => 'Jabatan\GolonganController@getList', 'as' => 'sotk.jabatan.golongan.list']);
            $router->get('/golongan/{id}', ['uses' => 'Jabatan\GolonganController@getDetail', 'as' => 'sotk.jabatan.golongan.detail']);

            $router->get('/kelas', ['uses' => 'Jabatan\KelasController@getList', 'as' => 'sotk.jabatan.kelas.list']);
            $router->get('/kelas/{id}', ['uses' => 'Jabatan\KelasController@getDetail', 'as' => 'sotk.jabatan.kelas.detail']);

            $router->get('/', ['uses' => 'Jabatan\JabatanController@getList', 'as' => 'sotk.jabatan.list']);
            $router->get('/{id}', ['uses' => 'Jabatan\JabatanController@getDetail', 'as' => 'sotk.jabatan.detail']);
        });
    }
}
