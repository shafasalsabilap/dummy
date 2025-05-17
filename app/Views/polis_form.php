<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Polis Asuransi Kendaraan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @font-face {
            font-family: 'Brice';
            src: url('<?= base_url("assets/font/Brice-SemiBoldSemiExpanded.ttf") ?>') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            background-color: #f1e7f8;
            font-family: 'Brice', sans-serif;
        }

        .form-container {
            background-color: white;
            border-radius: 20px;
            padding: 30px;
            width: 600px;
            margin: 50px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: 'Segoe UI', sans-serif;
        }

        .form-control {
            border-radius: 20px;
        }
        table, th, td {
            font-family: 'Segoe UI', sans-serif;
        }

        h2 {
            margin-top: 60px;
            margin-bottom: -30px;
            background-color: #c9a6f3;
            display: inline-block;
            padding:  30px;
            border-radius: 20px;
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
            font-weight: bold;
            font-size: 1.5rem;
        }


        .btn-tambah {
            background-color: #ffde59;
            color: black;
            font-weight: bold;
            border-radius: 20px;
            padding: 6px 25px;
            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
        }

        .btn-secondary {
            border-radius: 20px;
        }

        label {
            font-weight: bold;
        }

        .text-center{
            margin-bottom: 20px;  /* Jarak antar title dan kontennya */
            padding-top: 0;       /* Hilangkan jarak atas */
        }
    </style>
</head>
<body>

<div class="text-center">
    <h2>Tambah Polis Asuransi Kendaraan</h2>
</div>

<div class="form-container">
    <form action="<?= base_url('polis/store') ?>" method="post">
        <div class="form-group">
            <label>Nama Tertanggung</label>
            <input type="text" name="nama_tertanggung" class="form-control" required>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Tanggal Efektif</label>
                <input type="date" name="tanggal_efektif" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
                <label>Tanggal Expired</label>
                <input type="date" name="tanggal_expired" class="form-control" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Merk Kendaraan</label>
                <input type="text" name="merek_kendaraan" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
                <label>Tipe Kendaraan</label>
                <input type="text" name="tipe_kendaraan" class="form-control" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label>Tahun Kendaraan</label>
                <input type="number" name="tahun_kendaraan" class="form-control" required>
            </div>
            <div class="form-group col-md-4">
                <label>Harga Kendaraan</label>
                <input type="number" name="harga_kendaraan" class="form-control" id="harga_kendaraan" required>
            </div>
            <div class="form-group col-md-4">
                <label>Rate Premi (%)</label>
                <input type="number" step="0.01" name="rate_premi" class="form-control" id="rate_premi" required>
            </div>
        </div>

        <div class="form-group">
            <label>Harga Premi</label>
            <input type="text" name="harga_premi" class="form-control" id="harga_premi" readonly>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-tambah">Tambah</button>
        </div>
    </form>
</div>

<script>
    const hargaKendaraan = document.getElementById('harga_kendaraan');
    const ratePremi = document.getElementById('rate_premi');
    const hargaPremi = document.getElementById('harga_premi');

    function hitungPremi() {
        const harga = parseFloat(hargaKendaraan.value) || 0;
        const rate = parseFloat(ratePremi.value) || 0;
        const premi = harga * (rate / 100);
        hargaPremi.value = Math.round(premi);
    }

    hargaKendaraan.addEventListener('input', hitungPremi);
    ratePremi.addEventListener('input', hitungPremi);
</script>

</body>
</html>
