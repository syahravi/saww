<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penilaian {{ $santri->nama }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid black; text-align: left; }
        th { background-color: #4CAF50; color: white; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Laporan Penilaian Santri: {{ $santri->nama_santri }}</h2>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kriteria</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penilaian as $key => $data)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $data->criteria->kriteria }}</td>
                <td>{{ $data->nilai }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p style="margin-top: 20px;"><strong>Total Nilai Akhir:</strong> {{ number_format($penilaian->avg('nilai'), 2) }}</p>
</body>
</html>
