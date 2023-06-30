<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\Invoice;
use App\Models\QuotationDetail;
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
        $quotation = Quotation::find($request->quotation_id);
        $amount_due = $quotation->amount_due - $invoice->termin2;
        Quotation::where("id", $request->quotation_id)->update([
            'amount_due' => $amount_due,
        ]);

        return redirect('view-invoice')->with('success', 'Request updated successfully');
    }
}
