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
        $invoice = Invoice::join('quotation', 'quotation.id', '=', 'invoice.id')->get();
        return view('invoice/view-invoice', compact('invoice'));
    }

    public function bayar_invoice($id)
    {
        $quotation = Quotation::find($id);
        $quotation_detail = QuotationDetail::where('quotation_id', $id)->get();
        return view('invoice/bayar-invoice', compact('quotation', 'quotation_detail'));
    }

    public function update_invoice(Request $request, $id)
    {
        $this->validate($request, [
            'amount_paid' => 'required'
        ]);

        Invoice::where("id", $id)->update([
            'pembayaran' => $request->amount_paid,
            'status' => 'paid',
        ]);

        return redirect('view-invoice')->with('success', 'Request updated successfully');
    }
}
