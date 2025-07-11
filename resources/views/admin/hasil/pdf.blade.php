<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 10 Ranking Santri</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Top 10 Ranking Santri</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Santri</th>
                <th>Nilai SAW</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($topSantri as $index => $santri)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $santri->santri->nama_santri }}</td> <!-- Sesuaikan dengan relasi dan field yang ada -->
                   <td>{{ number_format($nilaiAkhirData[$santri->id] ?? 0, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</body>
</html>
