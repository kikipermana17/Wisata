<?php

namespace App\Http\Controllers;

use App\Models\Wisata;

class FrontendController extends Controller
{
    public function index()
    {
        $wisata = Wisata::all();
        return view('layouts.frontend', compact('wisata'));
    }
}
