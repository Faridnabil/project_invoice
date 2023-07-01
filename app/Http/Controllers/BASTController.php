<?php

namespace App\Http\Controllers;

use App\Models\BAST;
use App\Models\Invoice;
use App\Models\SPK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BASTController extends Controller
{
    public function index()
    {
        $bast = BAST::all();
        return view('berita-acara.view-berita', compact('bast'));
    }

    public function pdf($id)
    {
        $spk = SPK::find($id);
        $invoice = Invoice::find($id);
        $bast = BAST::find($id);
        return view('berita-acara.beritaprint', compact('invoice', 'bast'));
    }
}
