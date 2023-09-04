<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita Acara</title>
    <link rel="shortcut icon" href="{{ asset('template/dist/img/genz-3d.png') }}" type="image/x-icon">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        @page {
            margin-top: 0;
            margin-bottom: 0;
        }

        .p {
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
                    <center><img src="{{ asset('template/dist/img/genz-global.png') }}" width="150px" /></center>
                </td>
                <td colspan="11">
                    <h3
                        style=" text-align: right; margin-top: 5px; font-size: 12px; font-family: Arial, Helvetica, sans-serif; font-weight: bolder;">
                        GEN Z COMPANY</h3>
                    <p
                        style=" text-align: right; margin-top: -25px; font-size: 11px; font-family: Arial, Helvetica, sans-serif;">
                        <br />
                        <i>Jl. Pramuka RT12/04, Bunder, Jatiluhur, Purwakarta 41117</i><br>
                        genzcompany23@gmail.com

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
                <td>{{ date('d.m', strtotime($bast->created_at)) }}/
                    @switch(date('m', strtotime($bast->created_at)))
                        @case(date(1, strtotime($bast->created_at)))
                            I
                        @break

                        @case(date(2, strtotime($bast->created_at)))
                            II
                        @break

                        @case(date(3, strtotime($bast->created_at)))
                            III
                        @break

                        @case(date(4, strtotime($bast->created_at)))
                            IV
                        @break

                        @case(date(5, strtotime($bast->created_at)))
                            V
                        @break

                        @case(date(6, strtotime($bast->created_at)))
                            VI
                        @break

                        @case(date(7, strtotime($bast->created_at)))
                            VII
                        @break

                        @case(date(8, strtotime($bast->created_at)))
                            VIII
                        @break

                        @case(date(9, strtotime($bast->created_at)))
                            IX
                        @break

                        @case(date(10, strtotime($bast->created_at)))
                            X
                        @break

                        @case(date(11, strtotime($bast->created_at)))
                            XI
                        @break

                        @case(date(12, strtotime($bast->created_at)))
                            XII
                        @break
                    @endswitch/{{ date('Y', strtotime($bast->created_at)) }}/{{ $bast->no_bast }}
                </td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ Carbon\Carbon::create($bast->created_at)->isoFormat('DD MMMM Y') }}</td>
            </tr>
            <tr>
                <td colspan="12">
                    <p style="text-align: center; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">BERITA
                        ACARA SERAH TERIMA</p>
                </td>
            </tr>
            <tr>
                <td colspan="12">
                    <p style="text-align: justify;">Melalui surat ini, kami yang bertanda tangan di bawah ini, <br><br>
                    <table>
                        <tr>
                            <td>Nama/Instansi</td>
                            <td>:</td>
                            <td>Gen Z Company</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>Jl. Pramuka RT12/04, Bunder, Jatiluhur, Purwakarta 41117</td>
                        </tr>
                    </table><br>
                    dalam hal ini bertindak atas nama Gen Z Company dan selanjutnya disebut
                    <b>PIHAK PERTAMA</b>. <br><br>
                    <table>
                        <tr>
                            <td>Nama/Instansi</td>
                            <td>:</td>
                            <td>{{ $bast->invoice->quotation->customer_name }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td> {{ $bast->invoice->quotation->address }}</td>
                        </tr>
                    </table>
                    </p>
                    <p style="text-align: justify;">
                        dalam hal ini bertindak atas nama {{ $bast->invoice->quotation->customer_name }} dan selanjutnya
                        disebut <b>PIHAK
                            KEDUA</b>. <br><br>
                        <b>PIHAK PERTAMA</b> dan <b>PIHAK KEDUA</b> secara bersama-sama (selanjutnya disebut sebagai
                        <b>PARA PIHAK</b>). <br><br>
                        Berdasarkan Surat Perjanjian Kerja Sama dengan referensi nomor invoice
                        {{ date('d.m', strtotime($bast->invoice->created_at)) }}/
                        @switch(date('m', strtotime($bast->invoice->created_at)))
                            @case(date(1, strtotime($bast->invoice->created_at)))
                                I
                            @break

                            @case(date(2, strtotime($bast->invoice->created_at)))
                                II
                            @break

                            @case(date(3, strtotime($bast->invoice->created_at)))
                                III
                            @break

                            @case(date(4, strtotime($bast->invoice->created_at)))
                                IV
                            @break

                            @case(date(5, strtotime($bast->invoice->created_at)))
                                V
                            @break

                            @case(date(6, strtotime($bast->invoice->created_at)))
                                VI
                            @break

                            @case(date(7, strtotime($bast->invoice->created_at)))
                                VII
                            @break

                            @case(date(8, strtotime($bast->invoice->created_at)))
                                VIII
                            @break

                            @case(date(9, strtotime($bast->invoice->created_at)))
                                IX
                            @break

                            @case(date(10, strtotime($bast->invoice->created_at)))
                                X
                            @break

                            @case(date(11, strtotime($bast->invoice->created_at)))
                                XI
                            @break

                            @case(date(12, strtotime($bast->invoice->created_at)))
                                XII
                            @break
                        @endswitch/{{ date('Y', strtotime($bast->invoice->created_at)) }}/{{ $bast->invoice->no_inv }}
                        perihal pekerjaan {{ $bast->invoice->quotation->nama_project }}.
                    </p>
                    <p style="text-align: justify;"><b>PIHAK PERTAMA</b> menyampaikan untuk progress pekerjaan/barang*
                        sudah sesuai dan telah diselesaikan 100% berdasarkan kondisi akhir dilokasi dan diterima dengan
                        baik oleh <b>PIHAK KEDUA</b>. Dengan ini disertakan juga lampiran invoice sebagai kewajiban
                        <b>PIHAK KEDUA</b> untuk melakukan pembayaran atas jasa/barang tersebut dengan detail berikut:
                    </p>
                    <table>
                        <tr>
                            <td>Nomor SPK</td>
                            <td>:</td>
                            <td>{{ date('d.m', strtotime($bast->spk->created_at)) }}/
                                @switch(date('m', strtotime($bast->spk->created_at)))
                                    @case(date(1, strtotime($bast->spk->created_at)))
                                        I
                                    @break

                                    @case(date(2, strtotime($bast->spk->created_at)))
                                        II
                                    @break

                                    @case(date(3, strtotime($bast->spk->created_at)))
                                        III
                                    @break

                                    @case(date(4, strtotime($bast->spk->created_at)))
                                        IV
                                    @break

                                    @case(date(5, strtotime($bast->spk->created_at)))
                                        V
                                    @break

                                    @case(date(6, strtotime($bast->spk->created_at)))
                                        VI
                                    @break

                                    @case(date(7, strtotime($bast->spk->created_at)))
                                        VII
                                    @break

                                    @case(date(8, strtotime($bast->spk->created_at)))
                                        VIII
                                    @break

                                    @case(date(9, strtotime($bast->spk->created_at)))
                                        IX
                                    @break

                                    @case(date(10, strtotime($bast->spk->created_at)))
                                        X
                                    @break

                                    @case(date(11, strtotime($bast->spk->created_at)))
                                        XI
                                    @break

                                    @case(date(12, strtotime($bast->spk->created_at)))
                                        XII
                                    @break
                                @endswitch/{{ date('Y', strtotime($bast->spk->created_at)) }}/{{ $bast->spk->no }}
                            </td>
                        </tr>
                        <tr>
                            <td>Nomor Invoice</td>
                            <td>:</td>
                            <td>{{ date('d.m', strtotime($bast->invoice->created_at)) }}/
                                @switch(date('m', strtotime($bast->invoice->created_at)))
                                    @case(date(1, strtotime($bast->invoice->created_at)))
                                        I
                                    @break

                                    @case(date(2, strtotime($bast->invoice->created_at)))
                                        II
                                    @break

                                    @case(date(3, strtotime($bast->invoice->created_at)))
                                        III
                                    @break

                                    @case(date(4, strtotime($bast->invoice->created_at)))
                                        IV
                                    @break

                                    @case(date(5, strtotime($bast->invoice->created_at)))
                                        V
                                    @break

                                    @case(date(6, strtotime($bast->invoice->created_at)))
                                        VI
                                    @break

                                    @case(date(7, strtotime($bast->invoice->created_at)))
                                        VII
                                    @break

                                    @case(date(8, strtotime($bast->invoice->created_at)))
                                        VIII
                                    @break

                                    @case(date(9, strtotime($bast->invoice->created_at)))
                                        IX
                                    @break

                                    @case(date(10, strtotime($bast->invoice->created_at)))
                                        X
                                    @break

                                    @case(date(11, strtotime($bast->invoice->created_at)))
                                        XI
                                    @break

                                    @case(date(12, strtotime($bast->invoice->created_at)))
                                        XII
                                    @break
                                @endswitch/{{ date('Y', strtotime($bast->invoice->created_at)) }}/{{ $bast->invoice->no_inv }}
                            </td>
                        </tr>
                        <tr>
                            <td>Nominal Invoice yang harus dibayar </td>
                            <td>:</td>
                            <td>Rp. {{ number_format($bast->invoice->quotation->amount, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                    <br><br><br><br>

                    <p>Purwakarta, {{ Carbon\Carbon::now()->isoFormat('DD MMMM Y') }}</p>

                    <table width="670px" cellspacing="0" cellpadding="0">
                        <tr>
                            <td><b>PIHAK PERTAMA</b><br>

                                <br><br><br><br><br><br>
                                Farid Nabil F., S.Tr.Kom<br>
                                CEO Gen Z Company
                            </td>
                            <td align="right">
                                <b>PIHAK KEDUA</b>
                                <br><br><br><br><br><br>
                                {{ $bast->invoice->quotation->pic }} <br>
                                PIC {{ $bast->invoice->quotation->customer_name }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
    <script>
        window.print(); // Melakukan pencetakan saat halaman dimuat
        window.onafterprint = function() {
            window.close(); // Menutup jendela cetakan setelah pencetakan selesai
        };
    </script>
</body>
