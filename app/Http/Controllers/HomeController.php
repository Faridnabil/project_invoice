<?php

namespace App\Http\Controllers;

use App\Models\BAST;
use App\Models\Invoice;
use App\Models\Quotation;
use App\Models\SPK;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function count_data()
    {
        $quotation = Quotation::count();
        $spk = SPK::count();
        $invoice = Invoice::count();
        $bast = BAST::count();
        $amount_due = Quotation::sum('amount_due');
        return view('menu.home', compact('quotation', 'spk', 'invoice', 'bast', 'amount_due'));
    }
}
