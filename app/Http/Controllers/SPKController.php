<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\QuotationDetail;
use App\Models\SPK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SPKController extends Controller
{
    public function index()
    {
        $quo = Quotation::all();
        $spk = SPK::all();
        return view('spk.index', compact('spk', 'quo'));
    }

    public function show()
    {
        $quo = Quotation::all();
        $spk = SPK::all();
        return view('spk.create', compact('spk', 'quo'));
    }

    public function store(Request $request)
    {
        try {
            $kode = DB::table('spk')->count();
            $addNol = '';
            $kodetb = 'SPK-';
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
                'quotation_id' => '',
            ], $messages);

            $spk = SPK::create([
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
                'quotation_id' => $request->quotation_id,
            ], $rules);

            //echo $spk;
            return redirect('view-spk')->with('success', 'Data Berhasil Dibuat');
        } catch (\Exception $e) {
            //return $e->getMessage();
            return redirect('view-spk')->with('error', 'Data Gagal Dibuat');
        }
    }

    public function showEdit($id)
    {
        $spk = SPK::find($id);
        return view('spk.edit', compact('spk'));
    }

    public function update(Request $request, $id)
    {
        try {
            $messages = [
                'required' => 'Data harus diisi!',
                'max' => 'Ukuran tidak boleh lebih dari 2mb',
                'numeric' => 'Harus menggunakan angka',
                'file.required' => 'File surat tidak boleh kosong!',
                'file.mimes' => 'File harus berupa file dengan tipe: pdf dengan ukuran max: 2048',
            ];

            $rules = $request->validate([
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

            $spk = SPK::where('id', $id)->update([
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

            //echo $spk;
            return redirect('view-spk')->with('success', 'Data Berhasil Diubah');
        } catch (\Exception $e) {
            // echo $spk;
            //return $e->getMessage();
            return redirect('view-spk')->with('error', 'Data Gagal Dibuat');
        }
    }

    public function destroy($id)
    {
        try {
            SPK::find($id)->delete();
            return redirect('view-spk')->with('success', 'Request deleted successfully');
        } catch (\Exception $e) {
            return redirect('view-spk')->with('error', 'Request deleted error');
        }
    }

    public function pdf($id)
    {
        $spk = SPK::find($id);
        $quo = QuotationDetail::join('quotation','quotation.id', '=', 'quotation_detail.quotation_id')->select(
            'quotation.id',
            'quotation.amount_paid',
        )
        ->where("quotation_id", $id)
        ->get();
        return view('spk.pdf', compact('spk', 'quo'));
    }
}
