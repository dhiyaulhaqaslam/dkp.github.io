<!DOCTYPE html>
<html>

<head>
    <title>Detail Longwis</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td,
        th {
            padding: 8px;
            border: 1px solid #000;
        }
    </style>
</head>

<body>
    <h2>Detail Longwis - {{ $longwis->nama }}</h2>
    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $longwis->nama }}</td>
        </tr>
        <tr>
            <th>Panjang Lorong</th>
            <td>{{ $longwis->panjang_lorong }} m</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ $longwis->tanggal }}</td>
        </tr>
        <tr>
            <th>Lebar Depan</th>
            <td>{{ $longwis->lebar_depan }} m</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $longwis->alamat }}</td>
        </tr>
        <tr>
            <th>Lebar Tengah</th>
            <td>{{ $longwis->lebar_tengah }} m</td>
        </tr>
        <tr>
            <th>Penduduk</th>
            <td>{{ $longwis->penduduk }} Warga</td>
        </tr>
        <tr>
            <th>Lebar Belakang</th>
            <td>{{ $longwis->lebar_belakang }} m</td>
        </tr>
        <tr>
            <th>Rumah</th>
            <td>{{ $longwis->rumah }} unit</td>
        </tr>
        <tr>
            <th>Koordinat Lorong</th>
            <td>{{ $longwis->koordinat_lorong }}</td>
        </tr>
    </table>
</body>

</html>
