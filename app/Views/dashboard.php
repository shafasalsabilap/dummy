<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3e8ff;
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #c084fc;
            color: black;
            padding: 20px;
            border-radius: 20px;
            text-align: center;
            font-weight: bold;
        }
        .card-custom {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card-custom:hover {
            transform: scale(1.05);
        }
        .btn-custom {
            background-color: #fde047;
            color: black;
            border-radius: 15px;
            padding: 10px 20px;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="header">
        <h2>Dashboard</h2>
    </div>

    <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <div class="card card-custom p-4 text-center">
                <h5>Kelola Data</h5>
                <p>Polis Asuransi Kendaraan</p>
                <p> INI ADA KESALAHAN JADI AKU UPDATE YANG BARU</p>
                <a href="<?= base_url('polis') ?>" class="btn btn-custom mt-3">Lihat Data Polis</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
