<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Quotation</title>
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
                        <p>QUOTATION
                            <hr>
                            Quotation Number&nbsp;<br>
                            Client Name&nbsp;<br>
                            Project&nbsp;<br>
                            Date of Quotation&nbsp;
                        </p>
                    </td>
                    <td>
                        <p>&nbsp;
                            <hr>
                            :
                            {{ date('d.m', strtotime($quotation->tanggal_quotation)) }}/
                            @switch(date('m', strtotime($quotation->tanggal_quotation)))
                                @case(date(1, strtotime($quotation->tanggal_quotation)))
                                    I
                                @break

                                @case(date(2, strtotime($quotation->tanggal_quotation)))
                                    II
                                @break

                                @case(date(3, strtotime($quotation->tanggal_quotation)))
                                    III
                                @break

                                @case(date(4, strtotime($quotation->tanggal_quotation)))
                                    IV
                                @break

                                @case(date(5, strtotime($quotation->tanggal_quotation)))
                                    V
                                @break

                                @case(date(6, strtotime($quotation->tanggal_quotation)))
                                    VI
                                @break

                                @case(date(7, strtotime($quotation->tanggal_quotation)))
                                    VII
                                @break

                                @case(date(8, strtotime($quotation->tanggal_quotation)))
                                    VIII
                                @break

                                @case(date(9, strtotime($quotation->tanggal_quotation)))
                                    IX
                                @break

                                @case(date(10, strtotime($quotation->tanggal_quotation)))
                                    X
                                @break

                                @case(date(11, strtotime($quotation->tanggal_quotation)))
                                    XI
                                @break

                                @case(date(12, strtotime($quotation->tanggal_quotation)))
                                    XII
                                @break
                            @endswitch
                            /{{ date('Y', strtotime($quotation->tanggal_quotation)) }}/{{ $quotation->no_quotation }}<br>
                            : {{ $quotation->customer_name }}<br>
                            : {{ $quotation->nama_project }}<br>
                            : {{ date('D, d F Y', strtotime($quotation->tanggal_quotation)) }}
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
                            admin@globaltech.id

                        </p>
                    </td>
                </tr>
            </thead>
        </table>
        <br><br><br>
        <table width="670px" cellspacing="0" cellpadding="0" border="1">
            <thead>
                <tr>
                    <th>No</th>
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
                        <td>{{ $item->item_name }}</td>
                        <td>{{ $item->qty }} {{ $item->satuan }}</td>
                        <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($item->total, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>PPN/VAT 11%</td>
                    <td>Rp. {{ number_format($quotation->tax_amount, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>GRAND TOTAL</td>
                    <td>Rp. {{ number_format($quotation->amount, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <br><br>
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
                    ({{ $quotation->customer_name }})
                </td>
            </tr>
        </table>
    </center>
    <script>
        window.print();
    </script>
</body>
