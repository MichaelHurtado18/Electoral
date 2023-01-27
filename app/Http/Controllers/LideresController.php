<?php

namespace App\Http\Controllers;

use App\Models\Lideres;
use Illuminate\Http\Request;

class LideresController extends Controller
{
    //

    public function index()
    {
        return view('lideres.index');
    }

    public function create()
    {
        return view('lideres.create');
    }

    public function edit(Lideres $lider)
    {
        
        return view('lideres.edit', ['lider' => $lider]);
    }
}
