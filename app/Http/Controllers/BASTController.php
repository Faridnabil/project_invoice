<?php

namespace App\Http\Controllers;

use App\Models\BAST;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BASTController extends Controller
{
    public function index()
    {
        $bast = BAST::all();
        return view('berita-acara.view-berita', compact('bast'));
    }

    public function show()
    {
        $bast = BAST::all();
        return view('berita-acara.create', compact('bast'));
    }

    public function store(Request $request)
    {
        try{
        $kode = DB::table('bast')->count();
        $addNol = '';
        $kodetb = 'BAST-';
        $kode = str_replace($kodetb, "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;

        if (strlen($kode) == 1) {
            $addNol = "00";
        } elseif (strlen($kode) == 2) {
            $addNol = "0";
        }
        $id_spk = $kodetb . $addNol . $incrementKode;

        $messages = [
            'required' => 'Data harus diisi!',
            'max' => 'Ukuran tidak boleh lebih dari 2mb',
            'numeric' => 'Harus menggunakan angka',
            'file.required' => 'File surat tidak boleh kosong!',
            'file.mimes' => 'File harus berupa file dengan tipe: pdf dengan ukuran max: 2048',
        ];

        $rules = $request->validate([
            'no' => '',
            'tgl' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'ktp' => 'required',
            'nama1' => 'required',
            'alamat1' => 'required',
            'telp1' => 'required',
            'ktp1' => 'required',
        ], $messages);

        $bast = BAST::create([
            'no' => $id_spk,
            'tgl' => $request->tgl,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'ktp' => $request->ktp,
            'nama1' => $request->nama1,
            'alamat1' => $request->alamat1,
            'telp1' => $request->telp1,
            'ktp1' => $request->ktp1,
        ], $rules);

        echo $bast;
        // return redirect('view-spk')->with('success', 'Data Berhasil Dibuat');
    }catch(\Exception $e)
    {
        // echo $spk;
        return $e->getMessage();
    }
        //return redirect('view-spk')->with('success', 'Data Berhasil Dibuat');
    }

    public function pdf()
    {
        return view('berita-acara.beritaprint');
    }
}
