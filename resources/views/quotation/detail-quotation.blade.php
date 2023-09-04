<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Quotation - {{ $quotation->customer_name }}</title>
    <link rel="shortcut icon" href="{{ asset('template/dist/img/genz-3d.png') }}" type="image/x-icon">
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

            html,
            body {
                width: 210mm;
                height: 297mm;
            }
        }
    </style>
</head>

<body>
    <center>
        <table cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <td colspan="2" width="20%" style="text-align: left; font-weight: bold;">QUOTATION</td>
                    <td rowspan="3">
                        <img src="{{ asset('template/dist/img/genz-3d.png') }}" width="60px"
                            style="text-align: right; margin-left: 260px;" />
                        <h3
                            style="text-align: right; margin-top: 5px; font-size: 12px; font-family: Arial, Helvetica, sans-serif; font-weight: bolder;">
                            Gen Z Company</h3>
                        <p
                            style="text-align: right; margin-top: -25px; font-size: 11px; font-family: Arial, Helvetica, sans-serif;">
                            <br />
                            <i>Jl. Pramuka RT12/04, Bunder, Jatiluhur, Purwakarta 41117</i><br>
                            genzcompany23@gmail.com

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
                    <td width="20%">No. Quotation <br>
                        Client Name <br>
                        Project <br>
                        Date
                    </td>
                    <td>: {{ date('d.m', strtotime($quotation->created_at)) }}/
                        @switch(date('m', strtotime($quotation->created_at)))
                            @case(date(1, strtotime($quotation->created_at)))
                                I
                            @break

                            @case(date(2, strtotime($quotation->created_at)))
                                II
                            @break

                            @case(date(3, strtotime($quotation->created_at)))
                                III
                            @break

                            @case(date(4, strtotime($quotation->created_at)))
                                IV
                            @break

                            @case(date(5, strtotime($quotation->created_at)))
                                V
                            @break

                            @case(date(6, strtotime($quotation->created_at)))
                                VI
                            @break

                            @case(date(7, strtotime($quotation->created_at)))
                                VII
                            @break

                            @case(date(8, strtotime($quotation->created_at)))
                                VIII
                            @break

                            @case(date(9, strtotime($quotation->created_at)))
                                IX
                            @break

                            @case(date(10, strtotime($quotation->created_at)))
                                X
                            @break

                            @case(date(11, strtotime($quotation->created_at)))
                                XI
                            @break

                            @case(date(12, strtotime($quotation->created_at)))
                                XII
                            @break
                        @endswitch
                        /{{ date('Y', strtotime($quotation->created_at)) }}/{{ $quotation->no_quotation }}<br>
                        : {{ $quotation->customer_name }}<br>
                        : {{ $quotation->nama_project }}<br>
                        : {{ Carbon\Carbon::create($quotation->created_at)->isoFormat('DD MMMM Y') }}
                    </td>
                </tr>
            </thead>
        </table>
        <br>
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
                        <td align="center">{{ $loop->iteration }}</td>
                        <td>{{ $item->item_name }}</td>
                        <td align="center">{{ $item->qty }} {{ $item->satuan }}</td>
                        <td align="right">Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td align="right">Rp. {{ number_format($item->total, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table> <br><br>
        <table width="300px" cellspacing="0" cellpadding="0" border="1" align="right" style="margin-right: 60px">
            <tr style="font-weight: bold">
                <td>PPN/VAT 11%</td>
                <td align="right">Rp. {{ number_format($quotation->tax_amount, 0, ',', '.') }}</td>
            </tr>
            <tr style="font-weight: bold">

                <td>GRAND TOTAL</td>
                <td align="right">Rp. {{ number_format($quotation->amount, 0, ',', '.') }}</td>
            </tr>
        </table>
        <table width="670px" cellspacing="0" cellpadding="0">
            <tr>
                <td><b>Notes :</b><br>
                    {!! $quotation->description !!}
                </td>
            </tr>
        </table>
        <br>
        <table width="670px" cellspacing="0" cellpadding="0">
            <tr>
                <td><b>Term and Agreements :</b><br>
                    {!! $quotation->perjanjian !!}
                </td>
            </tr>
        </table>
        <br>
        <table width="670px" cellspacing="0" cellpadding="0">
            <tr>
                <td><b>Payment Transfer To :</b><br>
                    Account Number : {{ $quotation->bank_number }}<br>
                    @if ($quotation->bank_number == '373601030504533')
                        Account Name : Nurul Huda<br>
                        Bank Name    : Bank Rakyat Indonesia (BRI)<br>
                    @else
                        Account Name : Farid Nabil Firdaus<br>
                        Bank Name    : Bank Central Asia (BCA)<br>
                    @endif
                </td>
            </tr>
        </table>
        <br><br>
        <table width="670px" cellspacing="0" cellpadding="0">
            <tr>
                <td>Prepared by<br>
                    Gen Z Company
                    <br><br><br><br><br><br>
                    Farid Nabil F., S.Tr.Kom<br>
                    CEO
                </td>
                <td align="right">
                    Client<br>
                    {{ $quotation->customer_name }}
                    <br><br><br><br><br><br>
                    {{ $quotation->pic }}<br>
                    PIC
                </td>
            </tr>
        </table>
    </center>
</body>

<script>
    window.print(); // Melakukan pencetakan saat halaman dimuat
    window.onafterprint = function() {
        window.close(); // Menutup jendela cetakan setelah pencetakan selesai
    };
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js">
