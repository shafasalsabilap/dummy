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
        nav button {
        margin: 5px;
        padding: 8px 12px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        }
        nav button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="header d-flex justify-content-between align-items-center">
        <h2>Dashboard</h2>
        <a href="/logout" class="btn btn-danger">Logout</a>
    </div>
     <nav style="margin-bottom: 20px;">
        <strong>Navigasi Bab:</strong><br>
        <button onclick="location.href='/pembelajaran_sql/dasar'">Bab 1: Query Dasar</button>
        <button onclick="location.href='/pembelajaran_sql/agregasi'">Bab 2: Agregasi & Grouping</button>
        <button onclick="location.href='/pembelajaran_sql/join'">Bab 3: Relasi Tabel (JOIN)</button>
        <button onclick="location.href='/pembelajaran_sql/subquery'">Bab 4: Subquery & Nested Query</button>
        <button onclick="location.href='/pembelajaran_sql/manipulasi'">Bab 5: Manipulasi Data</button>
        <button onclick="location.href='/pembelajaran_sql/advanced'">Bab 6: Advanced Data</button>
        <button onclick="location.href='/pembelajaran_sql/tambahan'">Bab 7: Tambahan</button>
        <button onclick="location.href='http://localhost:8080/api-view/polis_api_view.html'">Data Polis (API)</button>
    </nav>
    <div class="row mt-5 justify-content-center">
        <div class="col-md-4">
            <div class="card card-custom p-4 text-center">
                <h5>Kelola Data</h5>
                <p>Polis Asuransi Kendaraan</p>
                <a href="<?= base_url('polis') ?>" class="btn btn-custom mt-3">Lihat Data Polis</a>
            </div>
        </div>
    </div>
    
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
