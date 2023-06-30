<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
        }

        @page {
            margin-top: 0;
            margin-bottom: 0;
        }

        .p {
            text-align: justify;
        }

        header,
        footer {
            display: none;
        }
    </style>
</head>

<body>
    <center>
        <table width="670px" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <td>
                        <p>
                            <strong>INVOICE</strong>
                            <hr>
                            Invoice Number&nbsp;<br>
                            Client Name&nbsp;<br>
                            Project&nbsp;<br>
                            Date of Quotation&nbsp;<br>
                            Status&nbsp;
                        </p>
                    </td>
                    <td>
                        <p>&nbsp;
                            <hr>
                            :
                            {{ date('d.m', strtotime($invoice->quotation->tanggal_quotation)) }}/
                            @switch(date('m', strtotime($invoice->quotation->tanggal_quotation)))
                                @case(date(1, strtotime($invoice->quotation->tanggal_quotation)))
                                    I
                                @break

                                @case(date(2, strtotime($invoice->quotation->tanggal_quotation)))
                                    II
                                @break

                                @case(date(3, strtotime($invoice->quotation->tanggal_quotation)))
                                    III
                                @break

                                @case(date(4, strtotime($invoice->quotation->tanggal_quotation)))
                                    IV
                                @break

                                @case(date(5, strtotime($invoice->quotation->tanggal_quotation)))
                                    V
                                @break

                                @case(date(6, strtotime($invoice->quotation->tanggal_quotation)))
                                    VI
                                @break

                                @case(date(7, strtotime($invoice->quotation->tanggal_quotation)))
                                    VII
                                @break

                                @case(date(8, strtotime($invoice->quotation->tanggal_quotation)))
                                    VIII
                                @break

                                @case(date(9, strtotime($invoice->quotation->tanggal_quotation)))
                                    IX
                                @break

                                @case(date(10, strtotime($invoice->quotation->tanggal_quotation)))
                                    X
                                @break

                                @case(date(11, strtotime($invoice->quotation->tanggal_quotation)))
                                    XI
                                @break

                                @case(date(12, strtotime($invoice->quotation->tanggal_quotation)))
                                    XII
                                @break
                            @endswitch
                            /{{ date('Y', strtotime($invoice->quotation->tanggal_quotation)) }}/{{ $invoice->no_inv }}<br>
                            : {{ $invoice->quotation->customer_name }}<br>
                            : {{ $invoice->quotation->nama_project }}<br>
                            : {{ date('D, d F Y', strtotime($invoice->quotation->tanggal_quotation)) }} <br>
                            : @if ($invoice->status=='paid')
                                Termin 1
                            @elseif ($invoice->status=='unpaid')
                                Belum membayar
                            @elseif ($invoice->status=='lunas')
                                Lunas
                            @endif
                        </p>
                    </td>
                    <td>
                        <img src="{{ asset('template/dist/img/logo-global.png') }}" width="190px"
                            style="text-align: right; margin-left: 160px;" />
                        <h3
                            style="text-align: right; margin-top: 5px; font-size: 12px; font-family: Arial, Helvetica, sans-serif; font-weight: bolder;">
                            PT GLOBAL TECHNOLOGY ESSENTIAL</h3>
                        <p
                            style="text-align: right; margin-top: -25px; font-size: 11px; font-family: Arial, Helvetica, sans-serif;">
                            <br />
                            <i>Bumi Jaya Indah E 12 A, Purwakarta, Jawa Barat, 41117</i><br>
                            globaltechnologyessential@gmail.com

                        </p>
                    </td>
                </tr>
            </thead>
        </table>


        <table width="670px" cellspacing="0" cellpadding="0" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Item</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quotation_detail as $item)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->item_code }}</td>
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->qty }} {{ $item->satuan }}</td>
                        <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($item->total, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> <br><br>
        <table width="300px" cellspacing="0" cellpadding="0" border="1" align="right" style="margin-right: 15px">
                <tr style="font-weight: bold">
                    <td style="background-color: yellow">PPN/VAT 11%</td>
                    <td>Rp. {{ number_format($invoice->quotation->tax_amount, 0, ',', '.') }}</td>
                </tr>
                <tr style="font-weight: bold">

                    <td style="background-color: yellow">DP</td>
                    <td>Rp. {{ number_format($invoice->termin1, 0, ',', '.') }}</td>
                </tr>
                <tr style="font-weight: bold">

                    <td style="background-color: yellow">GRAND TOTAL</td>
                    <td>Rp. {{ number_format($invoice->quotation->amount, 0, ',', '.') }}</td>
                </tr>

                <tr style="font-weight: bold">

                    <td style="background-color: yellow">SISA TAGIHAN</td>
                    <td>Rp. {{ number_format($invoice->quotation->amount_due, 0, ',', '.') }}</td>
                </tr>
        </table>
        @if ($invoice->status=='paid')
            <img style="margin-right: 50px" src="{{ asset('img/paid.png') }}" width="200px" />
        @elseif ($invoice->status=='unpaid')
            <img style="margin-right: 50px" src="{{ asset('img/unpaid.png') }}" width="200px" />
        @elseif ($invoice->status=='lunas')
            <img style="margin-right: 50px" src="{{ asset('img/lunas.png') }}" width="200px" />
        @endif
        <table width="670px" cellspacing="0" cellpadding="0">
            <tr>
                <td>Notes :<br>
                    Nilai diatas sudah termasuk PPN<br>
                    Timeline (1-2 Minggu)<br>
                    Meeting, Diskusi, Preview dilakukan secara online via WA/Email<br>
                    Additional cost akan dikenakan jika spesifikasi & notes diluar item diatas<br>
                    Sudah termasuk IP Public selama 6 bulan, selanjutnya dikenakan biaya Rp.200.000/bulan<br>
                    Pengerjaan 7-14 hari
                </td>
            </tr>
        </table>
        <br>
        <table width="670px" cellspacing="0" cellpadding="0">
            <tr>
                <td>Term and Agreements :<br>
                    1. Pembayaran DP minimal 50% dari Total Harga<br>
                    2. Pembayaran 2x Termin, sebelum pemasangan dan sesudah pekerjaan selesai<br>
                    3. Harga sudah termasuk PPN 11%<br>
                    4. Garansi produk 1 tahun, cacat produk dari pabrik kecuali (human error, petir, dll)<br>
                    5. Garansi instalasi 6 bulan
                </td>
            </tr>
        </table>
        <br>
        <table width="670px" cellspacing="0" cellpadding="0">
            <tr>
                <td>Payment Transfer To :<br>
                    Account Number : 1362450042<br>
                    Account Name : PT Global Technology Essential<br>
                    Bank Name : Bank Negara Indonesia<br>
                </td>
            </tr>
        </table>
        <br><br>
        <table width="670px" cellspacing="0" cellpadding="0">
            <tr>
                <td>Prepared by<br>
                    PT Global Technology Essential
                    <br><br><br><br><br><br>
                    M Ridzky Farhan<br>
                    CEO
                </td>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
                <td>&nbsp;
                    Client Approval
                    <br><br><br><br><br><br>
                    ({{ $invoice->quotation->customer_name }})
                </td>
            </tr>
        </table>
    </center>
    <script>
        window.print();
    </script>
</body>
