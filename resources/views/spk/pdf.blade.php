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
                <td colspan="12"><br /></td>
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
