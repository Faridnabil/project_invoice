<?php

namespace App\Http\Controllers;

use App\Models\BAST;
use App\Models\Invoice;
use App\Models\SPK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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
        $today = Carbon::now()->isoFormat('D MMMM Y');
        return view('berita-acara.beritaprint', compact('invoice', 'bast', 'today'));
    }
}
