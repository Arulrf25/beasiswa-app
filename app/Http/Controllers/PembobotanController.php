<?php

namespace App\Http\Controllers;
use App\Models\DataMahasiswa;
use App\Models\Crips;

use Illuminate\Http\Request;

class PembobotanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = DataMahasiswa::get();

        return $mahasiswa;

        foreach ($mahasiswa as $key => $value) {

            $cari_bobot_ipk         = Crips::where('nama_crips', $value->ipk)->pluck('bobot');
            $cari_bobot_gaji        = Crips::where('nama_crips', $value->gaji_ortu)->pluck('bobot');
            $cari_bobot_prestasi    = Crips::where('nama_crips', $value->prestasi)->pluck('bobot');
            $cari_bobot_organisasi  = Crips::where('nama_crips', $value->organisasi)->pluck('bobot');
            $cari_bobot_tanggungan  = Crips::where('nama_crips', $value->tanggungan)->pluck('bobot');
            $mahasiswa[$key]['bobot_ipk']           = $cari_bobot_ipk[0];
            $mahasiswa[$key]['bobot_gaji']          = $cari_bobot_gaji[0];
            $mahasiswa[$key]['bobot_prestasi']      = $cari_bobot_prestasi[0];
            $mahasiswa[$key]['bobot_organisasi']    = $cari_bobot_organisasi[0];
            $mahasiswa[$key]['bobot_tanggungan']    = $cari_bobot_tanggungan[0];

            // return $cari_bobot_ipk[0]['bobot'];
        }



        // return view('pembobotan.index', compact('mahasiswa'));
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
