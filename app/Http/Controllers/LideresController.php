<?php

namespace App\Http\Controllers;

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
}
