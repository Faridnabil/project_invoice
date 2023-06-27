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
        $invoice = Invoice::with('quotation_detail')->get();
        return view('invoice/view-invoice', compact('invoice'));
    }

    public function detail_invoice(Request $request)
    {
        $quotation = Quotation::all();
        $now = date('Y-m-d');
        $start_date = strtotime($now);
        $end_date = strtotime("+14 day", $start_date);

        Invoice::create([
            'no_inv' => '$id_inv',
            'quotation_detail_id' => '$data->id',
            'status' => 'unpaid',
            'issue_date' => date('Y-m-d', $start_date),
            'due_date' => date('Y-m-d', $end_date)
        ]);
        return view('invoice/detail-invoice', compact('quotation'));
    }

    public function create_invoice(Request $request)
    {
        $quotation = Quotation::all();
        $quotation_detail = QuotationDetail::all();
        return view('invoice/create-invoice', compact('quotation_detail', 'quotation'));
    }
}
