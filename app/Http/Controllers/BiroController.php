<?php

namespace App\Http\Controllers;

use App\Models\Biro;
use App\Models\Wisatawan;
use Illuminate\Http\Request;

class BiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biro = Biro::all();
        return view('biro.index', compact('biro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $wisatawan = Wisatawan::all();
        return view('biro.create', compact('wisatawan'));
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
            'wisatawan_id' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telpon' => 'required',
        ]);

        $biro = new Biro;
        $biro->wisatawan_id = $request->wisatawan_id;
        $biro->nama = $request->nama;
        $biro->alamat = $request->alamat;
        $biro->telpon = $request->telpon;
        $biro->save();
        return redirect()->route('biro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Biro  $biro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $biro = Biro::findOrFail($id);
        return view('biro.show', compact('biro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Biro  $biro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wisatawan = Wisatawan::all();
        $biro = Biro::findOrFail($id);
        return view('biro.edit', compact('biro', 'wisatawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Biro  $biro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi data
        $validated = $request->validate([
            'wisatawan_id' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telpon' => 'required',
        ]);

        $biro = Biro::findOrFail($id);
        $biro->wisatawan_id = $request->wisatawan_id;
        $biro->nama = $request->nama;
        $biro->alamat = $request->alamat;
        $biro->telpon = $request->telpon;
        $biro->save();
        return redirect()->route('biro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Biro  $biro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $biro = Biro::findOrFail($id);
        $biro->delete();
        return redirect()->route('biro.index');
    }
}
