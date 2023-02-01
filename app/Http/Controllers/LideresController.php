<?php

namespace App\Http\Controllers;

use App\Models\Lideres;
use App\Models\Votantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LideresController extends Controller
{
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

    public function show(Lideres $lider)
    {
        return view('lideres.show', ["lider" => $lider]);
    }
}
