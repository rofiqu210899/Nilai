<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template Extrakurikuler</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                @php
                $columns = [
                'no',
                'Event',
                'lomba',
                'Nama Peserta',
                'Juri',
                'Kategori',
                'Nilai',

                ];
                @endphp
                @foreach ($columns as $column)
                <th style="background-color: #4CAF50; color: #fff; font-weight: bold; border: 1px solid #000;">{{
                    $column }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @php
            $no=1;
            @endphp
            @foreach ($data as $row)
            <tr>
                <td style="border: 1px solid #000;">{{$no++}}</td>
                <td style="border: 1px solid #000;">{{$row->event->name}}</td>
                <td style="border: 1px solid #000;">{{$row->lomba->nama_lomba}}</td>
                <td style="border: 1px solid #000;">{{$row->peserta->nama_peserta}}</td>
                <td style="border: 1px solid #000;">{{$row->juri->nama_juri}}</td>
                <td style="border: 1px solid #000;">{{$row->kategori->kategori}}</td>
                <td style="border: 1px solid #000;">{{$row->nilai}}</td>


            </tr>
            @endforeach
        </tbody>
    </table>



</body>

</html>