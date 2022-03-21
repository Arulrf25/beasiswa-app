<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Crips;


class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data_kriteria = Kriteria::all();
        // return $data_kriteria;
        return view('kriteria.index', compact('data_kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kriteria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required',
            'attribut' => 'required',
            'bobot' => 'required',
        ]);

        Kriteria::create($request->all());

        return redirect()->route('kriteria.index')
            ->with('success', 'Kriteria Sukses Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $data_crips = Crips::where('kriteria_id', $id)->get();
        return view('crips.index', compact(['kriteria', 'data_crips']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_kriteria = Kriteria::findOrFail($id);
        return view('kriteria.edit', compact('data_kriteria'));
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
        $data = Kriteria::findOrFail($id);
        $request->validate([
            'nama_kriteria' => 'required',
            'attribut' => 'required',
            'bobot' => 'required',
        ]);

        $data->update($request->all());
        return redirect()->route('kriteria.index')
        ->with('success', 'Project updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $kriteria->delete();
        $data = Kriteria::findOrFail($id);
        $data->delete();

        return redirect()->route('kriteria.show', $id)
            ->with('success', 'Project deleted successfully');

    }
}
