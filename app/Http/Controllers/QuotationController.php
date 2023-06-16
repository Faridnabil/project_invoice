<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
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
        $kodetb = 'INV';
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
        $id_inv = $kodetb . $addNol . $incrementKode;

        $rules = $request->validate([
            'no_invoice' => '',
            'tanggal' => 'required',
            'total' => '',
            'status' => '',
            'status_hod' => '',
            'status_director' => '',
            'status_yayasan' => '',
            'barang_id' => 'required',
        ]);

        Quotation::create([
            'no_invoice' => $id_inv,
            'tanggal' => $request->tanggal,
            'total' => 0,
            'status' => $request->status,
            'status_hod' => $request->status_hod,
            'status_director' => $request->status_director,
            'status_yayasan' => $request->status_yayasan,
            'users_id' => $request->users_id,
            'created_at' => now(),
        ]);

        $data = Quotation::latest()->first();
        $totaldata = count($request->barang_id);
        $totalrequest = 0;
        if ($totaldata != 0) {
            for ($i = 0; $i < $totaldata; $i++) {
                $barang = Barang::find($request->barang_id[$i]);

                //update stok barang (penjualan = bertambah)
                // Barang::find($request->barang_id[$i])->update([
                //     'stok' => $barang->stok + $request->kuantitas[$i]
                // ]);

                QuotationDetail::create([
                    'quotation_id' => $data->id,
                    'barang_id' => $request->barang_id[$i],
                    'satuan_id' => $request->satuan_id[$i],
                    'stok' => $request->stok[$i],
                    'sub_total' => $barang->harga * $request->stok[$i],
                    'created_at' => now(),
                ]);
                $totalrequest = $totalrequest + ($request->stok[$i] * $barang->harga);
            }
        }

        Quotation::where("id", $data->id)->update([
            'total' => $totalrequest
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
            'no_invoice' => '',
            'tanggal' => 'required',
            'total' => '',
            'status' => '',
            'status_hod' => '',
            'status_director' => '',
            'status_yayasan' => '',
            'barang_id' => 'required',
        ]);

        $barang = Barang::find($request->barang_id);

        Quotation::where("id", $id)->update([
            'no_invoice' => $request->no_request,
            'tanggal' => $request->tanggal,
            'total' => 0,
            'status' => $request->status,
            'status_hod' => $request->status_hod,
            'status_director' => $request->status_director,
            'status_yayasan' => $request->status_yayasan,
            'users_id' => $request->users_id,
            'updated_at' => now(),
        ]);

        // $data = QuotationDetail::where('quotation_id', $request)->get();
        $total = count($request->idreq);
        $totalrequest = 0;
        if ($total != 0) {
            for ($i = 0; $i < $total; $i++) {
                $barang = Barang::find($request->barang_id[$i]);

                //update stok barang (penjualan = bertambah)
                // Barang::find($request->barang_id[$i])->update([
                //     'stok' => $barang->stok + $request->kuantitas[$i]
                // ]);

                QuotationDetail::where('id', $request->idreq[$i])->update([
                    'barang_id' => $request->barang_id[$i],
                    'satuan_id' => $request->satuan_id[$i],
                    'stok' => $request->stok[$i],
                    'sub_total' => $barang->harga * $request->stok[$i],
                    'updated_at' => now(),
                ]);
                $totalrequest = $totalrequest + ($request->stok[$i] * $barang->harga);
            }
        }

        Quotation::where("id", $request->id)->update([
            'total' => $totalrequest
        ]);

        return redirect('view-quotation')->with('success', 'Request updated successfully');
    }

    public function delete_quotation($id)
    {
        QuotationDetail::find($id)->delete();

        return redirect('view-quotation')->with('success', 'Request deleted successfully');
    }
    //END BARANG

    public function detail_quotation(Request $request, $id)
    {
        $quotation = Quotation::find($id);
        $quotation_detail = QuotationDetail::where('quotation_id', $id)->get();

        return view('quotation/detail-quotation', compact('quotation', 'quotation_detail', 'user', 'barang'));

        $quotation['q'] = $request->query('q');
        $quotation['start'] = $request->query('start');
        $quotation['end'] = $request->query('end');
        $query = QuotationDetail::join('quotation', 'quotation.id', '=', 'quotation_detail.quotation_id')
            ->select(
                'quotation_detail.*',
                'quotation.no_invoice',
                'quotation.customer_name',
                'quotation.address',
                'quotation.total',
                'quotation.tax',
                'quotation.tax_amount',
                'quotation.amount_paid',
                'quotation.amount_due',

            )->where(function ($query) use ($quotation) {
                $query->where('customer_name', 'like', '%' . $quotation['q'] . '%');
                $query->orWhere('created_at', 'like', '%' . $quotation['q'] . '%');
            })->orderBy('id', 'ASC');

        if ($quotation['start'])
            $query->whereDate('created_at', '>=', $quotation['start']);
        if ($quotation['end'])
            $query->whereDate('created_at', '<=', $quotation['end']);

        $quotation['quotation'] = $query->paginate(15);

        return view('quotation/view-quotation', $quotation);
    }
}
