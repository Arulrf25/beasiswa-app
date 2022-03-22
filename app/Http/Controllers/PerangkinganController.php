<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMahasiswa;
use App\Models\Crips;
use App\Models\Kriteria;

class PerangkinganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = DataMahasiswa::get();

        foreach ($mahasiswa as $key => $value) {

            $cari_bobot_ipk         = Crips::where('nama_crips', $value->ipk)->pluck('bobot');
            $cari_bobot_gaji        = Crips::where('nama_crips', $value->gaji_ortu)->pluck('bobot');
            $cari_bobot_prestasi    = Crips::where('nama_crips', $value->prestasi)->pluck('bobot');
            $cari_bobot_organisasi  = Crips::where('nama_crips', $value->organisasi)->pluck('bobot');
            $cari_bobot_tanggungan  = Crips::where('nama_crips', $value->tanggungan)->pluck('bobot');
            $mahasiswa[$key]['bobot_ipk']           = $cari_bobot_ipk[0];
            $mahasiswa[$key]['bobot_gaji']     = $cari_bobot_gaji[0];
            $mahasiswa[$key]['bobot_prestasi']      = $cari_bobot_prestasi[0];
            $mahasiswa[$key]['bobot_organisasi']    = $cari_bobot_organisasi[0];
            $mahasiswa[$key]['bobot_tanggungan']    = $cari_bobot_tanggungan[0];

            // return $cari_bobot_ipk[0]['bobot'];
        }

        $ipk        = array();
        $gaji       = array();
        $prestasi   = array();
        $organisasi = array();
        $tanggungan = array();
        foreach ($mahasiswa as $key => $value) {
            array_push($ipk, $value->bobot_ipk);
            array_push($gaji, $value->bobot_gaji);
            array_push($prestasi, $value->bobot_prestasi);
            array_push($organisasi, $value->bobot_organisasi);
            array_push($tanggungan, $value->bobot_tanggungan);
        }

        // Benefit(max) dan cost(min)
        $max_value_ipk          = max($ipk);
        $min_value_gaji         = min($gaji);
        $max_value_prestasi     = max($prestasi);
        $max_value_organisasi   = max($organisasi);
        $max_value_tanggungan   = max($tanggungan) ;

        foreach ($mahasiswa as $key => $value) {
            $normalisasi_ipk        = $value->bobot_ipk/$max_value_ipk;
            $normalisasi_gaji       = $min_value_gaji/$value->bobot_gaji;
            $normalisasi_prestasi   = $value->bobot_prestasi/$max_value_prestasi;
            $normalisasi_organisasi = $value->bobot_organisasi/$max_value_organisasi;
            $normalisasi_tanggungan = $value->bobot_tanggungan/$max_value_tanggungan;

            $mahasiswa[$key]['normalisasi_ipk']           = $normalisasi_ipk;
            $mahasiswa[$key]['normalisasi_gaji']          = $normalisasi_gaji;
            $mahasiswa[$key]['normalisasi_prestasi']      = $normalisasi_prestasi;
            $mahasiswa[$key]['normalisasi_organisasi']    = $normalisasi_organisasi;
            $mahasiswa[$key]['normalisasi_tanggungan']    = $normalisasi_tanggungan;
        }

        $bobot_kriteria_ipk         = Kriteria::where('nama_kriteria', "IPK")->pluck('bobot');
        $bobot_kriteria_gaji        = Kriteria::where('nama_kriteria', "Penghasilan Orang Tua")->pluck('bobot');
        $bobot_kriteria_prestasi    = Kriteria::where('nama_kriteria', "Prestasi")->pluck('bobot');
        $bobot_kriteria_organisasi  = Kriteria::where('nama_kriteria', "Organisasi")->pluck('bobot');
        $bobot_kriteria_tanggungan  = Kriteria::where('nama_kriteria', "Jumlah Tanggungan Orang Tua")->pluck('bobot');

        foreach ($mahasiswa as $key => $value) {
            $jumlah = ($value->normalisasi_ipk*$bobot_kriteria_ipk[0]) + ($value->normalisasi_gaji*$bobot_kriteria_gaji[0]) + ($value->normalisasi_prestasi*$bobot_kriteria_prestasi[0]) + ($value->normalisasi_organisasi*$bobot_kriteria_organisasi[0]) + ($value->normalisasi_tanggungan*$bobot_kriteria_tanggungan[0]);
            $mahasiswa[$key]['total_bobot'] = $jumlah;
        }

        $data_finish = $mahasiswa->sortByDesc('total_bobot');
        return view('perangkingan.index', compact('data_finish'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
