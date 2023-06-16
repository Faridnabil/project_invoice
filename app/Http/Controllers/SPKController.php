<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SPKController extends Controller
{
    public function index()
    {
        return view('spk.index');
    }

    public function show()
    {
        return view('spk.create');
    }
}
