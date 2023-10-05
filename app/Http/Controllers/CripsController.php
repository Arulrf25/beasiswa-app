<?php

namespace App\Http\Controllers;
use App\Models\Crips;


use Illuminate\Http\Request;

class CripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        return view('crips.create', compact('id'));

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
            'kriteria_id' => 'required',
            'nama_crips' => 'required',
            'bobot'     => 'required'
        ]);

        Crips::create($request->all());

        return redirect()->route('kriteria.show', $request->kriteria_id)
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
        $data_crips = Crips::findOrFail($id);
        return view('crips.edit', compact('data_crips'));
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
        $data = Crips::findOrFail($id);
        $request->validate([
            'kriteria_id' => 'required',
            'nama_crips' => 'required',
            'bobot' => 'required',
        ]);

        $data->update($request->all());
        return redirect()->route('kriteria.show',$request->kriteria_id)
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
        $data = Crips::findOrFail($id);
        $data->delete();
        return back();
    }
}
