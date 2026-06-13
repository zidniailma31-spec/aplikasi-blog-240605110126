<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $nama_aplikasi }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 60px auto;
            padding: 0 20px;
            background-color: #f5f5f5;
        }

        .kartu {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h1 {
            color: #e74c3c;
            margin-bottom: 8px;
        }

        p {
            color: #555555;
            margin: 6px 0;
        }

        .label {
            font-weight: bold;
            color: #333333;
        }
    </style>
</head>
<body>
    <div class="kartu">
        <h1>{{ $nama_aplikasi }}</h1>

        <p>
            <span class="label">Versi Laravel:</span>
            {{ $versi_laravel }}
        </p>

        <p>
            <span class="label">Tanggal:</span>
            {{ $tanggal }}
        </p>
    </div>
</body>
</html>