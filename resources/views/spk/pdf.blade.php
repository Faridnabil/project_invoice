<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Surat Perjanjian Kerjasama</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        @page {
            size: auto;
            margin-top: 0;
            margin-bottom: 0;
            margin: 50px;
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
                        admin@globaltech.id

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
                <td>{{ Carbon\Carbon::create($spk->tgl)->isoFormat('DD MMMM Y') }}</td>
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
                                <td>{{ $spk->quotation->customer_name }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td> {{ $spk->quotation->address }}</td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td>:</td>
                                <td>{{ $spk->quotation->no_hp }}</td>
                            </tr>
                            <tr>
                                <td>Nomor KTP</td>
                                <td>:</td>
                                <td> {{ $spk->quotation->no_ktp }}</td>
                            </tr>
                        </table><br>
                        Dalam hal ini bertindak atas nama {{ $spk->quotation->customer_name }} dan selanjutnya disebut <b>PIHAK
                            KEDUA</b>. <br>
                        <b>PIHAK PERTAMA</b> dan <b>PIHAK KEDUA</b> secara bersama-sama (selanjutnya disebut sebagai
                        <b>PARA PIHAK</b>). <br><br>
                        Atas dasar pertimbangan yang diuraikan di atas, <b>PARA PIHAK</b> selanjutnya menerangkan dengan ini telah sepakat dan setuju untuk mengadakan Kerjasama dan disahkan dalam bentuk surat
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

                    <ol style="padding-left: 20px; padding-right:0px">
                        <li>
                            <p style="text-align: justify;">
                                PIHAK PERTAMA bertanggung jawab atas seluruh proses Kerjasama pekerjaan pembuatan
                                (Pembangunan Server Lokal) untuk PIHAK KEDUA sesuai dengan kesepakatan PARA PIHAK,
                                sebagai berikut : <br>

                            <ol type="a" style="padding-left: 20px">
                                <li>Menentukan timeline kerja</li>
                                <li>Mengatur dan memproses seluruh tahapan dan kegiatan Pembangunan Server Lokal</li>
                                <li>Membuat dan mensetting aplikasi sesuai dengan arahan PIHAK KEDUA</li>
                            </ol>
                            </p>
                        </li>
                        <li>
                            <p style="text-align: justify;">
                                PIHAK PERTAMA berhak menerima uang sebesar ............................. dan
                                potongan pajak sesuai dengan Peraturan Undang-Undang yang berlaku, dengan rincian
                                sebagai
                                berikut:
                                <br>
                            <ol type="a" style="padding-left: 20px">
                                <li>Total biaya pembuatan ............................. sebesar
                                    .............................
                                    yang dibagi menjadi dua termin, sebagai berikut : <br></li>
                                <ul type="disc" style="padding-left: 20px">
                                    <li>Termin pertama, ketika menandatangani dan menyepakati SPK sebesar 50% dari total
                                        biaya yaitu
                                        senilai .............................
                                    </li>
                                    <li>Termin kedua, ketika PIHAK PERTAMA menyerahkan hasil pekerjaan pembuatan
                                        Pembangunan Server
                                        Lokal terakhir dan menyerahkan berita acara serah terima (BAST) yang disepakati
                                        oleh PIHAK
                                        KEDUA sebesar
                                    </li>
                                    <li>Biaya tambahan untuk keperluan revisi yang telah melebihi batasan sesuai dengan
                                        perjanjian
                                        yang tertera dokumen quotation yang telah diberikan dengan nominal yang akan
                                        dibahas
                                        selanjutnya sebelum melaksanakan revisi.</li>
                                </ul>
                            </ol>

                            </p>
                        </li>
                        <li>
                            <p style="text-align: justify;">
                                PIHAK PERTAMA berkewajiban memberikan kesempatan revisi dalam pengerjaan pembuatan
                                ............................. sesuai dengan ketentuan yang tertera pada dokumen
                                <i>quotation</i>
                                yang telah diberikan.
                            </p>
                        </li>
                        <li>
                            <p style="text-align: justify;">
                                PIHAK PERTAMA berhak menjadikan hasil kerja sama ini untuk diperlihatkan sebagai hasil
                                kerja (portfolio) antar PIHAK PERTAMA dan PIHAK KEDUA, namun PIHAK PERTAMA tetap
                                berkewajiban untuk meminta persetujuan terlebih dahulu kepada PIHAK KEDUA
                                dalam hal penggunaan hasil pekerjaan ini untuk kepentingan PIHAK PERTAMA.
                                Adapun
                                ketidaksepahaman dalam perihal persetujuan akan
                                diselesaikan
                                secara musyawarah oleh PARA PIHAK.
                            </p>
                        </li>
                        <li>
                            <p style="text-align: justify;">
                                PIHAK PERTAMA wajib memberikan hasil pengerjaan pembuatan
                                .............................
                                kepada PIHAK &nbsp;&nbsp;&nbsp;&nbsp;KEDUA dengan rincian sebagai berikut : <br>
                            <ul type="disc" style="padding-left: 20px">
                                <li>.............................</li>
                                <li>.............................</li>
                                <li>.............................</li>
                            </ul>
                            </p>
                        </li>
                    </ol>





                    <p style="text-align: center;"><b>PASAL 4<br>
                            HAK DAN KEWAJIBAN PIHAK KEDUA</b><br>
                    </p>
                    <ol style="padding-left: 20px; padding-right:0px">
                        <li>
                            <p style="text-align: justify;">
                                Ide konsep yang telah dibuat oleh PIHAK PERTAMA berhak untuk direvisi sebanyak-banyaknya
                                1
                                (satu) kali oleh PIHAK KEDUA pada setiap fasenya dan harus melalui persetujuan PIHAK
                                KEDUA
                                sebelum dipublikasikan.
                            </p>
                        </li>
                        <li>
                            <p style="text-align: justify;">
                                PIHAK KEDUA berkewajiban membayar uang sebesar ............................. dan
                                potongan
                                pajak sesuai dengan Peraturan Undang-Undang yang berlaku, dengan rincian sesuai dengan
                                Pasal 3
                                Ayat 2.
                            </p>
                        </li>
                        <li>
                            <p style="text-align: justify;">
                                PIHAK KEDUA berhak meminta revisi dalam pengerjaan pembuatan
                                .............................
                                sesuai dengan ketentuan yang tertera pada dokumen quotation yang telah diberikan.
                            </p>
                        </li>
                        <li>
                            <p style="text-align: justify;">
                                PIHAK KEDUA berhak menerima hasil pengerjaan pembuatan .............................
                                kepada
                                PIHAK KEDUA dengan rincian sebagai berikut :<br>
                            <ul type="disc" style="padding-left: 20px">
                                <li>.............................</li>
                                <li>.............................</li>
                                <li>.............................</li>
                            </ul>
                            </p>
                        </li>
                        <li>

                            <p style="text-align: justify;">
                                Hasil pengerjaan Pembuatan ............................. sepenuhnya menjadi milik
                                PIHAK
                                KEDUA, sehingga penggunaan hasil ini untuk kepentingan PIHAK PERTAMA dan pihak lainnya
                                harus
                                berdasarkan persetujuan PIHAK KEDUA.
                            </p>
                        </li>
                    </ol>


                    <p style="text-align: center;"><b>PASAL 5 <br>
                            PERJANJIAN TAMBAHAN</b><br>
                    </p>
                    <p style="text-align: justify;">
                        Selanjutnya hal-hal yang tidak tercantum dalam surat perjanjian kerjasama ini dan apabila kelak
                        di kemudian hari ternyata terdapat kekurangan atau kekeliruan, maka akan diadakan perubahan atau
                        perbaikan yang dianggap perlu serta diatur dalam suatu perjanjian tambahan (addendum) dan
                        merupakan dokumen yang tidak terpisahkan dari surat perjanjian kerjasama ini.
                    </p>
                    <p style="text-align: center;"><b>PASAL 6 <br>
                            <i>FORCE MAJEURE</i></b><br>
                    </p>
                    <p style="text-align: justify;">
                        Force Majeure atau perselisihan yang terjadi dalam pelaksanaan perjanjian kerjasama ini sehingga
                        salah satu pihak tidak dapat memenuhi kewajibannya, maka masing-masing pihak akan
                        menyelesaikannya secara musyawarah untuk mufakat. Dan apabila dengan jalan musyawarah untuk
                        mufakat tidak juga terselesaikan, maka kedua belah pihak menunjuk dan menetapkan Badan Arbitrase
                        Nasional sebagai domisili hukum tetap dan tidak berubah sebagai tempat penyelesaian.
                        <br><br>Demikian SPK ini dibuat rangkap 2 (dua), disepakati dan ditandatangani oleh PARA PIHAK
                        dalam keadaan sadar, sehat jasmani dan rohani, tanpa ada tekanan, pengaruh, paksaan dari pihak
                        manapun, dengan bermaterai cukup, dan berlaku sejak ditandatangani.
                        <br><br><br>Purwakarta, {{ Carbon\Carbon::now()->isoFormat('DD MMMM Y') }}
                    </p>
                    <table width="670px" cellspacing="0" cellpadding="0">
                        <tr>
                            <td><b>PIHAK PERTAMA</b><br>

                                <br><br><br><br><br><br>
                                M Ridzky Farhan<br>
                                CEO PT Global Technology Essential
                            </td>
                            <td align="right">
                                <b>PIHAK KEDUA</b>
                                <br><br><br><br><br><br>
                                {{ $spk->quotation->pic }} <br>
                                PIC {{ $spk->quotation->customer_name }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </center>
    </td>
    </tr>
    </center>
    <script>
        window.print();
    </script>
</body>
