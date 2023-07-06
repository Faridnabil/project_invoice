<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Invoice Termin 2 - {{$invoice->quotation->customer_name}}</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
        }

        @page {
            margin-top: 0;
            margin-bottom: 0;
            margin: 10mm auto;
        }

        .p {
            text-align: justify;
        }

        header,
        footer {
            display: none;
        }

         @media print {
        html, body {
            width: 210mm;
            height: 297mm;
        }
    </style>
</head>

<body>
    <center>
        <table cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <td colspan="2" width="20%" style="text-align: left; font-weight: bold;">INVOICE</td>
                    <td rowspan="3"><img src="{{ asset('template/dist/img/logo-global.png') }}" width="190px"
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
                <tr>
                    <td colspan="2">
                        <hr>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td width="20%">No. Invoice <br>
                        Client Name <br>
                        Project <br>
                        Date <br>
                        Status</td>
                    <td>: {{ date('d.m', strtotime($invoice->quotation->tanggal_quotation)) }}/
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
                        : {{ Carbon\Carbon::create($invoice->quotation->tanggal_quotation)->isoFormat('DD MMMM Y') }} <br>
                        : Termin 2
                        </td>
                </tr>
            </thead>
        </table>
<br>
        <table width="680px" cellspacing="0" cellpadding="0" border="1">
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
                        <td align="center">{{ $loop->iteration }}</td>
                        <td>{{ $item->item_name }}</td>
                        <td align="center">{{ $item->qty }} {{ $item->satuan }}</td>
                        <td align="right">Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td align="right">Rp. {{ number_format($item->total, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> <br>
        <table width="300px" cellspacing="0" cellpadding="0" border="1" align="right" style="margin-right: 57px">
            <tr style="font-weight: bold">
                <td>PPN/VAT 11%</td>
                <td align="right">Rp. {{ number_format($invoice->quotation->tax_amount, 0, ',', '.') }}</td>
            </tr>
            <tr style="font-weight: bold">

                <td>DP</td>
                <td align="right">Rp. {{ number_format($invoice->termin1, 0, ',', '.') }}</td>
            </tr>
            <tr style="font-weight: bold">

                <td>GRAND TOTAL</td>
                <td align="right">Rp. {{ number_format($invoice->quotation->amount, 0, ',', '.') }}</td>
            </tr>

            <tr style="font-weight: bold">

                <td>SISA TAGIHAN</td>
                <td align="right">Rp. {{ number_format($invoice->quotation->amount_due, 0, ',', '.') }}</td>
            </tr>
        </table>
        <table width="670px" cellspacing="0" cellpadding="0">
            <tr>
                <td><b>Notes :</b><br>
                    {!! $invoice->quotation->description !!}
                </td>
            </tr>
        </table>
        <br>
        <table width="670px" cellspacing="0" cellpadding="0">
            <tr>
                <td><b>Term and Agreements :</b><br>
                    {!! $invoice->quotation->perjanjian !!}
                </td>
            </tr>
        </table>
        <br>
        <table width="670px" cellspacing="0" cellpadding="0">
            <tr>
                <td><b>Payment Transfer To :</b><br>
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
                <td align="right">&nbsp;
                    Client Approval
                    <br><br><br><br><br><br>
                    {{ $invoice->quotation->customer_name }}
                </td>
            </tr>
        </table>
    </center>
    <script>
        window.print();
    </script>
</body>
