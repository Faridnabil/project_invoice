<?php

namespace App\Http\Controllers;

use App\Models\BAST;
use App\Models\Invoice;
use App\Models\SPK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;

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
        return view('berita-acara.beritaprint', compact('invoice', 'bast', 'spk'));
    }

    public function upload_file($id, Request $request)
    {
        $file = $request->file('file');
        if (file_exists($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $folder = 'lampiran_bast';
            $file->move($folder, $nama_file);
            $path = $folder . "/" . $nama_file;
            //delete
            $data = BAST::where('id', $id)->first();
            File::delete($data->file);
        } else {
            $path = $request->pathFile;
        }

        $quotation = BAST::find($id);
        $quotation->file = $path;
        $quotation->save();

        return back();
    }

    public function download_file($id)
    {
        $file = BAST::find($id);
        $file_path = public_path($file->file);
        return response()->download($file_path);
    }
}
