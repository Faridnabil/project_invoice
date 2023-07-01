<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\Invoice;
use App\Models\BAST;
use App\Models\QuotationDetail;
use App\Models\SPK;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('invoice/bayar-termin1', compact('quotation', 'invoice'));
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

        $invoice = Invoice::latest()->first();
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

        return view('invoice/bayar-termin2', compact('quotation', 'invoice'));
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

        $invoice = Invoice::latest()->first();
        $spk = SPK::latest()->first();

        $quotation = Quotation::find($request->quotation_id);
        $amount_due = $quotation->amount_due - $invoice->termin2;
        Quotation::where("id", $request->quotation_id)->update([
            'amount_due' => $amount_due,
        ]);

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
        $id_bast = $kodetb . $addNol . $incrementKode;

        if ($invoice->status == 'lunas')
        {
            BAST::create([
                'no_bast' => $id_bast,
                'invoice_id' => $invoice->id,
            ]);
        }

        return redirect('view-invoice')->with('success', 'Request updated successfully');
    }

    public function detail_invoice(Request $request, $id)
    {
        $invoice = Invoice::find($id);
        $quotation = QuotationDetail::join('quotation', 'quotation.id', '=', 'quotation_detail.quotation_id')
        ->select('quotation.id',)
        ->where('quotation_id', $id)
        ->get();
        $quotation_detail = QuotationDetail::where('quotation_id', $id)->get();

        return view('invoice/cetak-invoice', compact('quotation_detail', 'invoice'));
    }
}
