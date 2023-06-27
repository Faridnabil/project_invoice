<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\Invoice;
use App\Models\QuotationDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotationController extends Controller
{
    public function view_quotation(Request $request)
    {
        $quotation = Quotation::all();

        return view('quotation/view-quotation', compact('quotation'));
    }

    public function create_quotation(Request $request)
    {
        $quotation = Quotation::all();
        $quotation_detail = QuotationDetail::all();

        return view('quotation/create-quotation', compact('quotation_detail', 'quotation'));
    }

    public function store_quotation(Request $request)
    {
        $kode = DB::table('quotation')->count();
        $addNol = '';
        $kodetb = 'QUO';
        $kodeinv = 'INV';
        $kode = str_replace($kodetb, "", $kode);
        $kode = (int) $kode + 1;
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
        $id_quot = $kodetb . $addNol . $incrementKode;
        $id_inv = $kodeinv . $addNol . $incrementKode;

        $rules = $request->validate([
            'no_quotation' => '',
            'customer_name' => 'required',
            'address' => 'required',
            'nama_project' => 'required',
            'tanggal_quotation' => 'required',
            'tax' => 'required',
            'tax_amount' => 'required',
            'sub_total' => 'required',
            'amount' => 'required',
            'amount_paid' => 'required',
            'amount_due' => 'required',

        ]);

        Quotation::create([
            'no_quotation' => $id_quot,
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'nama_project' => $request->nama_project,
            'tanggal_quotation' => $request->tanggal_quotation,
            'tax' => $request->tax,
            'tax_amount' => $request->tax_amount,
            'sub_total' => $request->sub_total,
            'amount' => $request->amount,
            'amount_paid' => $request->amount_paid,
            'amount_due' => $request->amount_due - $request->amount_paid,
            'created_at' => now(),
        ]);

        $now = date('Y-m-d');
        $start_date = strtotime($now);
        $end_date = strtotime("+14 day", $start_date);

        $data = Quotation::latest()->first();
        $totaldata = count($request->item_code);
        $totalrequest = 0;
        if ($totaldata != 0) {
            for ($i = 0; $i < $totaldata; $i++) {
                //update stok barang (penjualan = bertambah)
                // Barang::find($request->barang_id[$i])->update([
                //     'stok' => $barang->stok + $request->kuantitas[$i]
                // ]);

                QuotationDetail::create([
                    'quotation_id' => $data->id,
                    'item_code' => $request->item_code[$i],
                    'item_name' => $request->item_name[$i],
                    'qty' => $request->qty[$i],
                    'satuan' => $request->satuan[$i],
                    'price' => $request->price[$i],
                    'total' => $request->total[$i],
                    'created_at' => now(),
                ]);
            }
        }

        Invoice::create([
            'no_inv' => $id_inv,
            'no_quotation' => $incrementKode,
            'status' => 'unpaid',
            'pembayaran' => '0',
            'issue_date' => date('Y-m-d', $start_date),
            'due_date' => date('Y-m-d', $end_date)
        ]);

        return redirect('view-quotation')->with('success', 'Request created successfully');
    }

    public function edit_quotation($id)
    {
        $quotation = Quotation::find($id);
        $quotation_detail = QuotationDetail::where('quotation_id', $id)->get();

        return view('quotation/edit-quotation', compact('quotation', 'quotation_detail'));
    }

    public function update_quotation(Request $request, $id)
    {
        $this->validate($request, [
            'no_quotation' => '',
            'customer_name' => 'required',
            'address' => 'required',
            'nama_project' => 'required',
            'tanggal_quotation' => 'required',
            'tax' => 'required',
            'tax_amount' => 'required',
            'sub_total' => 'required',
            'amount' => 'required',
            'amount_paid' => 'required',
            'amount_due' => 'required',
        ]);

        Quotation::where("id", $id)->update([
            'no_quotation' => $request->no_quotation,
            'customer_name' => $request->customer_name,
            'address' => $request->address,
            'nama_project' => $request->nama_project,
            'tanggal_quotation' => $request->tanggal_quotation,
            'tax' => $request->tax,
            'tax_amount' => $request->tax_amount,
            'sub_total' => $request->sub_total,
            'amount' => $request->amount,
            'amount_paid' => $request->amount_paid,
            'amount_due' => $request->amount_due - $request->amount_paid,
            'updated_at' => now(),
        ]);

        // $data = QuotationDetail::where('quotation_id', $request)->get();
        $total = count($request->idreq);
        if ($total != 0) {
            for ($i = 0; $i < $total; $i++) {

                QuotationDetail::where('id', $request->idreq[$i])->update([
                    'item_code' => $request->item_code[$i],
                    'item_name' => $request->item_name[$i],
                    'qty' => $request->qty[$i],
                    'satuan' => $request->satuan[$i],
                    'price' => $request->price[$i],
                    'total' => $request->total[$i],
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect('view-quotation')->with('success', 'Request updated successfully');
    }

    public function delete_quotation($id)
    {
        Quotation::find($id)->delete();

        return redirect('view-quotation')->with('success', 'Request deleted successfully');
    }
    //END BARANG

    public function detail_quotation(Request $request, $id)
    {
        $quotation = Quotation::find($id);
        $quotation_detail = QuotationDetail::where('quotation_id', $id)->get();

        return view('quotation/detail-quotation', compact('quotation', 'quotation_detail'));
    }
}
