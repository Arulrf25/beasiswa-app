<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMahasiswa;
use Illuminate\Support\Facades\DB;


class DataMahasiswaController extends Controller
{
    public function index()
    {
        $data_mahasiswa = DataMahasiswa::get();
        return view('datamahasiswa.data_mahasiswa', [
            'colleges' => $data_mahasiswa
        ]);

    }

    public function create()
    {
        // Mengirim data dari modal tambah ke databae
        \App\Models\DataMahasiswa::create($request->all);
    }

    public function store(Request $request)
    {
        $input_data = $request->all();

        //  Array 1 dimensi
        $id = DB::select("SHOW TABLE STATUS LIKE 'data_mahasiswa'");
        $next_id = $id[0]->Auto_increment;
        // jika id terbaru lebih dari sama dengan 10 maka keluaranya 00 + id terbaru
        if ($next_id >= 10) {
            $input_data['id'] = '0' . $next_id;
            DataMahasiswa::create($input_data);
        } else {
            // selain itu maka 0 + id terbaru
            // default value dari nomor karyawan adalah 0 + id terbaru
            $input_data['id'] = '00' . $next_id;
            // tambah data
            DataMahasiswa::create($input_data);
        }
        return redirect()->route('data-mahasiswa.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $data_mahasiswa = DataMahasiswa::findOrFail($id);
        return view('datamahasiswa.edit')->with([
            'colleges' => $data_mahasiswa
        ]);
    }

    public function update(Request $request, $id)
    {
        $input_update = $request->all();
        $data_spesifik = DataMahasiswa::findOrFail($id);
        $data_spesifik->update($input_update);
        return redirect('data-mahasiswa');
    }

    public function destroy($id)
    {
        $data_spesifik = DataMahasiswa::findOrFail($id);
        $data_spesifik->delete();
        return redirect()->route('data-mahasiswa.index');
    }

}
