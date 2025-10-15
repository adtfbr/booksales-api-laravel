<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penulis</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 60%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h1>Daftar Penulis</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Penulis</th>
                <th>Bio Singkat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $author['id'] }}</td>
                    <td>{{ $author['name'] }}</td>
                    <td>{{ $author['bio'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>