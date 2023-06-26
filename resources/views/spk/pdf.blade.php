<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cetak Laporan Data Alumni</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
        }

        @page {
            margin-top: 0;
            margin-bottom: 0;
        }

        .p{
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
                <td>{{ date('d.m', strtotime($spk->tgl)) }}/
                    @switch(date('m', strtotime($spk->created_at)))
                        @case(date(1, strtotime($spk->tgl)))
                            I
                        @break

                        @case(date(2, strtotime($spk->tgl)))
                            II
                        @break

                        @case(date(3, strtotime($spk->tgl)))
                            III
                        @break

                        @case(date(4, strtotime($spk->tgl)))
                            IV
                        @break

                        @case(date(5, strtotime($spk->tgl)))
                            V
                        @break

                        @case(date(6, strtotime($spk->tgl)))
                            VI
                        @break

                        @case(date(7, strtotime($spk->tgl)))
                            VII
                        @break

                        @case(date(8, strtotime($spk->tgl)))
                            VIII
                        @break

                        @case(date(9, strtotime($spk->tgl)))
                            IX
                        @break

                        @case(date(10, strtotime($spk->tgl)))
                            X
                        @break

                        @case(date(11, strtotime($spk->tgl)))
                            XI
                        @break

                        @case(date(11, strtotime($spk->tgl)))
                            XII
                        @break
                    @endswitch/{{ date('Y', strtotime($spk->tgl)) }}/{{ $spk->no }}
                </td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>{{ $spk->tgl }}</td>
            </tr>
            <tr>
                <td colspan="12">
                    <p style="text-align: center; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">SURAT
                        PERJANJIAN KERJASAMA</p>
                </td>
            </tr>
            <tr>
                <td colspan="12">
                    <p style="text-align: justify;">Melalui surat ini, kami yang bertanda tangan di bawah ini, <br><br>
                        <table>
                            <tr>
                                <td>Nama/Instansi</td>
                                <td>:</td>
                                <td>{{ $spk->nama }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td> {{ $spk->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>:</td>
                                <td>{{ $spk->telp }}</td>
                            </tr>
                            <tr>
                                <td>Nomor KTP</td>
                                <td>:</td>
                                <td> {{ $spk->ktp }}</td>
                            </tr>
                        </table><br>
                        dalam hal ini bertindak atas nama {{ $spk->nama }} dan selanjutnya disebut
                        <b>PIHAK PERTAMA</b>. <br><br>
                        <table>
                            <tr>
                                <td>Nama/Instansi</td>
                                <td>:</td>
                                <td>{{ $spk->nama1 }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td> {{ $spk->alamat1 }}</td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>:</td>
                                <td>{{ $spk->telp1 }}</td>
                            </tr>
                            <tr>
                                <td>Nomor KTP</td>
                                <td>:</td>
                                <td> {{ $spk->ktp1 }}</td>
                            </tr>
                        </table><br>
                        Dalam hal ini bertindak atas nama {{ $spk->nama }} dan selanjutnya disebut <b>PIHAK
                            KEDUA</b>. <br>
                        <b>PIHAK PERTAMA</b> dan <b>PIHAK KEDUA</b> secara bersama-sama (selanjutnya disebut sebagai
                        <b>PARA PIHAK</b>). <br><br>
                        Atas dasar pertimbangan yang diuraikan di atas, <b>PARA PIHAK</b> selanjutnya menerangkan dengan
                        ini telah sepakat dan setuju untuk mengadakan Kerjasama dan disahkan dalam bentuk surat
                        perjanjian Kerjasama dengan ketentuan dan syarat sebagai berikut :
                    </p>
                    <p style="text-align: center;"><b>PASAL 1 <br>
                            PEKERJAAN</b><br></p>
                    <p style="text-align: justify;">
                        Surat perjanjian Kerjasama ini (selanjutnya disebut SPK) adalah sebagai langkah awal dalam
                        rangka pekerjaan pembuatan (Pembangunan Server Lokal) oleh PIHAK PERTAMA yang ditujukan kepada
                        PIHAK KEDUA.
                    </p>
                    <p style="text-align: center;"><b>PASAL 2 <br>
                            JANGKA WAKTU</b><br></p>
                    <p style="text-align: justify;">
                        Masa jangka waktu pekerjaan untuk PARA PIHAK adalah selama 1-2 minggu, terhitung pada tanggal
                        pembayaran termin pertama atau setelah SPK ini disepakati dan ditandatangani oleh PARA PIHAK
                        sampai dengan pembayaran termin kedua (lunas) atau hingga penyerahan hasil pekerjaan.
                    </p>
                    <p style="text-align: center;"><b>PASAL 3 <br>
                            HAK DAN KEWAJIBAN PIHAK PERTAMA</b><br></p>
                    <p style="text-align: justify;">
                        1.	PIHAK PERTAMA bertanggung jawab atas seluruh proses Kerjasama pekerjaan pembuatan &nbsp;&nbsp;&nbsp;(Pembangunan Server Lokal) untuk PIHAK KEDUA sesuai dengan kesepakatan PARA PIHAK, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sebagai berikut : <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a.	Menentukan timeline kerja <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b.	Mengatur dan memproses seluruh tahapan dan kegiatan Pembangunan Server Lokal <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;c.	Membuat dan mensetting aplikasi sesuai dengan arahan PIHAK KEDUA

                    </p>
                </td>
            </tr>
        </table>
    </center>
    </td>
    </tr>
    </center>
    {{-- <script>
        window.print();
    </script> --}}
</body>
