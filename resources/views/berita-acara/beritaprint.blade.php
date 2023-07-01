<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita Acara</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        @page {
            margin-top: 0;
            margin-bottom: 0;
        }

        .p{
            text-align: justify;
            /* font-family: Arial, Helvetica, sans-serif */
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
            <tr>
                <td>
                    <center><img src="{{ asset('template/dist/img/logo-global.png') }}" width="150px" /></center>
                </td>
                <td colspan="11">
                    <h3
                        style=" text-align: right; margin-top: 5px; font-size: 12px; font-family: Arial, Helvetica, sans-serif; font-weight: bolder;">
                        PT GLOBAL TECHNOLOGY ESSENTIAL</h3>
                    <p
                        style=" text-align: right; margin-top: -25px; font-size: 11px; font-family: Arial, Helvetica, sans-serif;">
                        <br />
                        <i>Bumi Jaya Indah E 12 A, Purwakarta, Jawa Barat, 41117</i><br>
                        globaltechnologyessential@gmail.com

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="12">
                    <hr />
                </td>
            </tr>
            <tr>
                <td width="2px">No</td>
                <td>:</td>
                <td>{{ date('d.m', strtotime($invoice->created_at)) }}/
                    @switch(date('m', strtotime($invoice->created_at)))
                        @case(date(1, strtotime($invoice->created_at)))
                            I
                        @break

                        @case(date(2, strtotime($invoice->created_at)))
                            II
                        @break

                        @case(date(3, strtotime($invoice->created_at)))
                            III
                        @break

                        @case(date(4, strtotime($invoice->created_at)))
                            IV
                        @break

                        @case(date(5, strtotime($invoice->created_at)))
                            V
                        @break

                        @case(date(6, strtotime($invoice->created_at)))
                            VI
                        @break

                        @case(date(7, strtotime($invoice->created_at)))
                            VII
                        @break

                        @case(date(8, strtotime($invoice->created_at)))
                            VIII
                        @break

                        @case(date(9, strtotime($invoice->created_at)))
                            IX
                        @break

                        @case(date(10, strtotime($invoice->created_at)))
                            X
                        @break

                        @case(date(11, strtotime($invoice->created_at)))
                            XI
                        @break

                        @case(date(11, strtotime($invoice->created_at)))
                            XII
                        @break
                    @endswitch/{{ date('Y', strtotime($invoice->created_at)) }}/{{ $invoice->no_inv }}
                </td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ $invoice->created_at }}</td>
            </tr>
            <tr>
                <td colspan="12">
                    <p style="text-align: center; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">BERITA ACARA SERAH TERIMA</p>
                </td>
            </tr>
            <tr>
                <td colspan="12">
                    <p style="text-align: justify;">Melalui surat ini, kami yang bertanda tangan di bawah ini, <br><br>
                        <table>
                            <tr>
                                <td>Nama/Instansi</td>
                                <td>:</td>
                                <td>PT Global Technology Essential</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td>Bumi Jaya Indah E 12 A, Purwakarta, Jawa Barat, 41117</td>
                            </tr>
                        </table><br>
                        dalam hal ini bertindak atas nama PT Global Technology Essential dan selanjutnya disebut
                        <b>PIHAK PERTAMA</b>. <br><br>
                        <table>
                            <tr>
                                <td>Nama/Instansi</td>
                                <td>:</td>
                                <td>{{ $invoice->quotation->customer_name }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td> {{ $invoice->quotation->address }}</td>
                            </tr>
                        </table>
                    </p>
                    <p style="text-align: justify;">
                        dalam hal ini bertindak atas nama {{ $invoice->quotation->customer_name }} dan selanjutnya disebut <b>PIHAK
                            KEDUA</b>. <br><br>
                        <b>PIHAK PERTAMA</b> dan <b>PIHAK KEDUA</b> secara bersama-sama (selanjutnya disebut sebagai
                        <b>PARA PIHAK</b>). <br><br>
                        Berdasarkan Surat Perjanjian Kerja Sama dengan referensi nomor invoice {{ $invoice->no_inv }} perihal pekerjaan {{ $invoice->quotation->nama_project }}.
                    </p>
                    <p style="text-align: justify;"><b>PIHAK PERTAMA</b> menyampaikan untuk progress pekerjaan/barang* sudah sesuai dan telah diselesaikan 100% berdasarkan kondisi akhir dilokasi dan diterima dengan baik oleh <b>PIHAK KEDUA</b>. Dengan ini disertakan juga lampiran invoice sebagai kewajiban PIHAK KEDUA untuk melakukan pembayaran atas jasa/barang tersebut dengan detail berikut:
                        <table>
                            <tr>
                                <td>Nomor SPK</td>
                                <td>:</td>
                                <td>SPK001</td>
                            </tr>
                            <tr>
                                <td>Nomor Invoice</td>
                                <td>:</td>
                                <td>{{ $invoice->no_inv }}</td>
                            </tr>
                            <tr>
                                <td>Nominal Invoice yang harus dibayar </td>
                                <td>:</td>
                                <td>Rp. {{ number_format($invoice->quotation->amount_due, 0, ',', '.') }}</td>
                            </tr>
                        </table><br>
                        <br><br><br>Purwakarta, .................
                    </p>

                    <table width="670px" cellspacing="0" cellpadding="0">
                        <tr>
                            <td><b>PIHAK PERTAMA,</b><br>

                                <br><br><br><br><br><br>
                                M Ridzky Farhan<br>
                                CEO PT Global Technology Essential
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
                            </td>
                            <td>
                                <b>PIHAK KEDUA,</b>
                                <br><br><br><br><br><br>
                                {{ $invoice->quotation->customer_name }}
                            </td>
                        </tr>
                    </table>
        </table>
    </center>
    </td>
    </tr>
    </center>
    <script>
        window.print();
    </script>
</body>
