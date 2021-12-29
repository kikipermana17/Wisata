<?php

namespace App\Http\Controllers;

use App\Models\Wisatawan;
use Illuminate\Http\Request;

class WisatawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisatawan = Wisatawan::all();
        return view('wisatawan.index', compact('wisatawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wisatawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi data
        $validated = $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'telppon' => 'required',

        ]);

        $wisatawan = new Wisatawan;
        $wisatawan->kategori_id = $request->kategori_id;
        $wisatawan->nama = $request->nama;
        $wisatawan->jk = $request->jk;
        $wisatawan->telpon = $request->telpon;
        $wisatawan->save();
        return redirect()->route('wisatawan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wisatawan  $wisatawan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wisatawan = Wisatawan::findOrFail($id);
        return view('$wisatawan.show', compact('$wisatawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wisatawan  $wisatawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wisatawan = Wisatawan::findOrFail($id);
        return view('wisatawan.edit', compact('wisatawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wisatawan  $wisatawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi data
        $validated = $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'telppon' => 'required',

        ]);

        $wisatawan = Wisatawan::findOrFail($id);
        $wisatawan->kategori_id = $request->kategori_id;
        $wisatawan->nama = $request->nama;
        $wisatawan->jk = $request->jk;
        $wisatawan->telpon = $request->telpon;
        $wisatawan->save();
        return redirect()->route('wisatawan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wisatawan  $wisatawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wisatawan = Wisatawan::findOrFail($id);
        $wisatawan->delete();
        return redirect()->route('wisatawan.index');

    }
}
