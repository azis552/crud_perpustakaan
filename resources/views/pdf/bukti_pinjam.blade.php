<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body onload="window.print()">
    <table style="border-collapse: collapse;">
        <tr>
            <th colspan="4" >PERPUSTAKAAN</th>
        </tr>
        <tr>
            <th colspan="4" >NO KAMBING</th>
        </tr>
        <tr>
            <th colspan="4" >08555555555</th>
        </tr>
        <tr>
            <th colspan="4" ><hr></th>
        </tr>
        <tr>
            <th style="border: 1px solid black; padding: 5px;">No</th>
            <th style="border: 1px solid black; padding: 5px;">Buku</th>
            <th style="border: 1px solid black; padding: 5px;">tanggal pinjam</th>
            <th style="border: 1px solid black; padding: 5px;">Tanggal Kembali</th>
        </tr>
        @php
            $no=1;
        @endphp
        @foreach ($data as $i)
            <tr>
                <td style="border: 1px solid black; padding: 5px;">{{ $no++ }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $i->buku->judul_buku }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $i->tanggal_pinjam }}</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $i->tanggal_kembali }}</td>
            </tr>
            <tr>
                <td style="border: 1px solid black; padding: 5px;" colspan="2">Peminjam</td>
                <td style="border: 1px solid black; padding: 5px;" >:</td>
                <td style="border: 1px solid black; padding: 5px;">{{ $i->siswa->nama }}</td>
            </tr>
            <tr>
                <td colspan="4">kembalikan tepat waktu ,
                <u><b>jika terlambat denda 1 jt per hari</b></u>
                </td>
            </tr>
            <tr>
                
            </tr>
            <tr>
                <td >
                    Kediri, ...............
                    <br>
                    Petugas
                    <br>
                    <br>
                    <br>
                    {{ Auth::user()->name }}
                </td>
                <td colspan="2" ></td>
                <td>
                    Kediri, ...............
                    <br>
                    Peminjam
                    <br>
                    <br>
                    <br>
                    {{ $i->siswa->nama }}
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>