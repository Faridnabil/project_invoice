<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\Invoice;
use App\Models\BAST;
use App\Models\QuotationDetail;
use App\Models\SPK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class InvoiceController extends Controller
{
    public function view_invoice(Request $request)
    {
        $invoice = Invoice::with('quotation')->get();
        return view('invoice/view-invoice', compact('invoice'));
    }

    public function bayar_termin1($id)
    {
        $invoice = Invoice::find($id);
        $quotation = QuotationDetail::join('quotation', 'quotation.id', '=', 'quotation_detail.quotation_id')
        ->select('quotation.id',)
        ->where('quotation_id', $id)
        ->get();
        $quotation_detail = QuotationDetail::where('quotation_id', $id)->get();
        return view('invoice/bayar-termin1', compact('quotation', 'invoice', 'quotation_detail'));
    }

    public function update_termin1(Request $request, $id)
    {
        $this->validate($request, [
            'termin1' => 'required',
            'termin2' => 'required'
        ]);

        Invoice::where("id", $id)->update([
            'termin1' => $request->termin1,
            'termin2' => $request->termin2,
            'status' => 'paid',
        ]);

        $invoice = Invoice::find($id);
        $quotation = Quotation::find($request->quotation_id);
        $amount_due = $quotation->amount_due - $invoice->termin1;
        Quotation::where("id", $request->quotation_id)->update([
            'amount_due' => $amount_due,
        ]);

        return redirect('view-invoice')->with('success', 'Request updated successfully');
    }

    public function bayar_termin2($id)
    {
        $invoice = Invoice::find($id);
        $quotation = QuotationDetail::join('quotation', 'quotation.id', '=', 'quotation_detail.quotation_id')
        ->select('quotation.id',)
        ->where('quotation_id', $id)
        ->get();
        $quotation_detail = QuotationDetail::where('quotation_id', $id)->get();
        return view('invoice/bayar-termin2', compact('quotation', 'invoice', 'quotation_detail'));
    }

    public function update_termin2(Request $request, $id)
    {
        $this->validate($request, [
            'termin1' => '',
            'termin2' => 'required'
        ]);

        Invoice::where("id", $id)->update([
            'termin1' => $request->termin1,
            'termin2' => $request->termin2,
            'status' => 'lunas',
        ]);

        $invoice = Invoice::find($id);

        $quotation = Quotation::find($request->quotation_id);
        $amount_due = $quotation->amount_due - $invoice->termin2;
        Quotation::where("id", $request->quotation_id)->update([
            'amount_due' => $amount_due,
        ]);

        $kode = DB::table('bast')->orderBy('id', 'desc')->first();
        if(!$kode)
        {
            $kodefix = 0;
        }else{
            $kodefix = substr($kode->no_bast, -5);
            // $kodefix = $kode->no_quotation;
        }
        $addNol = '';
        $kodebast = 'BAST';
        $kode = str_replace($kodebast, "", $kodefix);
        $kode = (int) $kodefix + 1;
        $incrementKode = $kode;

        if (strlen($kode) == 1) {
            $addNol = "0000";
        } elseif (strlen($kode) == 2) {
            $addNol = "000";
        } elseif (strlen($kode) == 3) {
            $addNol = "00";
        } elseif (strlen($kode) == 4) {
            $addNol = "00";
        }
        $id_bast = $kodebast . $addNol . $incrementKode;

        $inv = Invoice::find($id);
        $spk = SPK::find($id);

        if ($invoice->status == 'lunas')
        {
            BAST::create([
                'no_bast' => $id_bast,
                'invoice_id' => $inv->id,
                'spk_id' => $spk->id,
            ]);
        }

        return redirect('view-invoice')->with('success', 'Request updated successfully');
    }

    public function detail_termin1(Request $request, $id)
    {
        $invoice = Invoice::find($id);
        $quotation = QuotationDetail::join('quotation', 'quotation.id', '=', 'quotation_detail.quotation_id')
        ->select('quotation.id',)
        ->where('quotation_id', $id)
        ->get();
        $quotation_detail = QuotationDetail::where('quotation_id', $id)->get();

        return view('invoice/cetak-termin1', compact('quotation_detail', 'invoice'));
    }

    public function detail_termin2(Request $request, $id)
    {
        $invoice = Invoice::find($id);
        $quotation = QuotationDetail::join('quotation', 'quotation.id', '=', 'quotation_detail.quotation_id')
        ->select('quotation.id',)
        ->where('quotation_id', $id)
        ->get();
        $quotation_detail = QuotationDetail::where('quotation_id', $id)->get();

        return view('invoice/cetak-termin2', compact('quotation_detail', 'invoice'));
    }

    public function upload_file_termin1($id, Request $request)
    {
        $file = $request->file('file');
        if (file_exists($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $folder = 'lampiran_invoice';
            $file->move($folder, $nama_file);
            $path = $folder . "/" . $nama_file;
            //delete
            $data = Invoice::where('id', $id)->first();
            File::delete($data->file);
        } else {
            $path = $request->pathFile;
        }

        $quotation = Invoice::find($id);
        $quotation->file_termin1 = $path;
        $quotation->save();

        return back();
    }

    public function upload_file_termin2($id, Request $request)
    {
        $file = $request->file('file');
        if (file_exists($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $folder = 'lampiran_invoice';
            $file->move($folder, $nama_file);
            $path = $folder . "/" . $nama_file;
            //delete
            $data = Invoice::where('id', $id)->first();
            File::delete($data->file);
        } else {
            $path = $request->pathFile;
        }

        $quotation = Invoice::find($id);
        $quotation->file_termin2 = $path;
        $quotation->save();

        return back();
    }

    public function download_file_termin1($id)
    {
        $file = Invoice::find($id);
        $file_path = public_path($file->file_termin1);
        return response()->download($file_path);
    }

    public function download_file_termin2($id)
    {
        $file = Invoice::find($id);
        $file_path = public_path($file->file_termin2);
        return response()->download($file_path);
    }
}
