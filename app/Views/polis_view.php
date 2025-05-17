<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Polis Asuransi Kendaraan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php $fontUrl = base_url('assets/font/Brice-SemiBoldSemiExpanded.ttf'); ?>
    <style>

        @font-face {
            font-family: 'Brice';
            src: url('<?= $fontUrl ?>') format('truetype');
        }

        body {
            font-family: 'Brice', sans-serif;
            background-color: #f1e7f8;
        }

        table, th, td {
            font-family: 'Segoe UI', sans-serif;
        }
        /* @font-face {
            font-family: 'Brice';
            src: url('<?= base_url("assets/fonts/Brice-SemiBoldSemiExpanded.ttf") ?>') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        body {
            background-color: #f1e7f8;
            font-family: 'Brice', sans-serif;
        } */

        .container-box {
            background-color: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .header-box {
            background-color: #c59ff5;
            padding: 15px 30px;
            border-radius: 20px;
            text-align: center;
            color: black;
            font-weight: bold;
            font-size: 1.5rem;
            box-shadow: 0 5px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .btn-tambah {
            background-color: #ffe28a;
            border: none;
            color: black;
            font-weight: bold;
            padding: 8px 20px;
            border-radius: 25px;
            float: right;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
        }

        table {
            border-radius: 15px;
            overflow: hidden;
        }

        th {
            background-color: #f4f6f8;
            text-align: center;
        }

        td, th {
            vertical-align: middle !important;
        }

        .btn-action {
            border: none;
            padding: 5px 10px;
            border-radius: 6px;
            color: white;
        }

        .btn-edit {
            background-color: #ffc107;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .table-container {
            border-radius: 15px;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="header-box">Daftar Polis Asuransi Kendaraan</div>
        <div class="container-box">

        <div class="d-flex justify-content-end mb-3">
            <a href="<?= base_url('polis/create') ?>" class="btn btn-tambah">
                Tambah
            </a>
        </div>


            <div class="table-container">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Polis</th>
                            <th>Nama Tertanggung</th>
                            <th>Periode</th>
                            <th>Nama Item</th>
                            <th>Harga Pertanggungan</th>
                            <th>Harga Premi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($polis as $row): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $row['nomor_polis'] ?></td>
                                <td><?= $row['nama_tertanggung'] ?></td>
                                <td><?= $row['tanggal_efektif'] ?> s.d. <?= $row['tanggal_expired'] ?></td>
                                <td><?= $row['merek_kendaraan'] ?> - <?= $row['tipe_kendaraan'] ?></td>
                                <td><?= number_format($row['harga_kendaraan'], 0, ',', '.') ?></td>
                                <td><?= number_format($row['harga_premi'], 0, ',', '.') ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('polis/edit/' . $row['id']) ?>" class="btn-action btn-edit" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <br><br>
                                    <a href="<?= base_url('polis/delete/' . $row['id']) ?>" class="btn-action btn-delete" title="Hapus" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php if (empty($polis)): ?>
                            <tr>
                                <td colspan="8" class="text-center">Belum ada data polis</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
