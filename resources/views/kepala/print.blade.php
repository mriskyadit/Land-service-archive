<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Rekap Pelayanan Pertanahan</title>

    <style>
        @page {
            size: A4;
            margin: 2.5cm 2.5cm 3cm 2.5cm;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            color: #000;
        }

        /* KOP SURAT */
        .kop {
            width: 100%;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .kop table {
            width: 100%;
            border: none;
        }

        .kop td {
            border: none;
            vertical-align: middle;
        }

        .logo {
            width: 90px;
        }

        .kop-text {
            text-align: center;
        }

        .kop-text h1 {
            font-size: 16pt;
            margin: 0;
            font-weight: bold;
        }

        .kop-text h2 {
            font-size: 14pt;
            margin: 2px 0;
            font-weight: bold;
        }

        .kop-text p {
            font-size: 10pt;
            margin: 2px 0 0;
        }

        /* JUDUL */
        .judul {
            text-align: center;
            margin: 30px 0 20px;
        }

        .judul h3 {
            margin: 0;
            font-size: 14pt;
            font-weight: bold;
            text-decoration: underline;
        }

        /* INFO */
        .info {
            margin-bottom: 15px;
        }

        /* TABEL DATA */
        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table.data th,
        table.data td {
            border: 1px solid #000;
            padding: 8px;
        }

        table.data th {
            background-color: #eaeaea;
            text-align: center;
            font-weight: bold;
        }

        table.data td:last-child {
            text-align: right;
        }

        /* TTD */
        .ttd {
            width: 100%;
            margin-top: 60px;
        }

        .ttd td {
            border: none;
            text-align: right;
        }

        .nama {
            margin-top: 70px;
            font-weight: bold;
            text-decoration: underline;
        }

        /* PRINT */
        @media print {
            button {
                display: none;
            }
        }
    </style>
</head>
<body>

<!-- KOP SURAT -->
<div class="kop">
    <table>
        <tr>
            <td class="logo">
                <!-- GANTI LOGO DI SINI -->
                <img src="{{ asset('logo.png') }}" width="90">
            </td>
            <td class="kop-text">
                <h1>KEMENTERIAN AGRARIA DAN TATA RUANG</h1>
                <h2>BADAN PERTANAHAN NASIONAL</h2>
                <h2>KANTOR PERTANAHAN KOTA MOJOKERTO</h2>
                <p>Jl. Contoh Alamat No. 123, Mojokerto | Telp. (0321) 123456</p>
            </td>
        </tr>
    </table>
</div>

<!-- JUDUL -->
<div class="judul">
    <h3>LAPORAN REKAP PELAYANAN PERTANAHAN</h3>
</div>

<!-- INFO -->
<div class="info">
    <strong>Tanggal Cetak :</strong> {{ date('d F Y') }}
</div>

<!-- TABEL -->
<table class="data">
    <tr>
        <th style="width:60%">Uraian</th>
        <th style="width:40%">Jumlah</th>
    </tr>
    <tr>
        <td>Total Permohonan Masuk</td>
        <td>{{ $totalMasuk }}</td>
    </tr>
    <tr>
        <td>Total Berkas Selesai</td>
        <td>{{ $selesai }}</td>
    </tr>
    <tr>
        <td>Total Berkas Dalam Proses</td>
        <td>{{ $proses }}</td>
    </tr>
</table>

<!-- TTD -->
<table class="ttd">
    <tr>
        <td>
            Mojokerto, {{ date('d F Y') }}<br>
            Kepala Kantor Pertanahan Kota Mojokerto
            <div class="nama">
                NAMA KEPALA KANTOR
            </div>
            NIP. 197XXXXXXXXXXXXX
        </td>
    </tr>
</table>

<!-- BUTTON -->
<button onclick="window.print()">Cetak Laporan</button>

</body>
</html>
