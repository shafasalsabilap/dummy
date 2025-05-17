<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Update Polis Asuransi Kendaraan</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    @font-face {
      font-family: 'Brice';
      src: url('<?= base_url("assets/font/Brice-SemiBoldSemiExpanded.ttf") ?>') format('truetype');
    }

    body {
      background-color: #e6d7f1;
      font-family: 'Brice', sans-serif;
    }

    .header-box {
      background-color: #c9a6f3;
      color: #222;
      text-align: center;
      font-size: 1.5rem;
      font-weight: bold;
      padding: 15px 30px;
      border-radius: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
      margin: 40px auto 20px;
      max-width: 700px;
    }

    .container-box {
      background-color: #fff;
      border-radius: 20px;
      padding: 30px;
      max-width: 700px;
      margin: auto;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      font-family: 'Segoe UI', sans-serif;
    }

    label {
      font-weight: bold;
    }

    .form-control {
      border-radius: 25px;
    }

    .btn-update {
      background-color: #ffde59;
      color: black;
      font-weight: bold;
      border-radius: 20px;
      padding: 8px 30px;
      border: none;
      box-shadow: 0 4px 4px rgba(0, 0, 0, 0.2);
    }

    .btn-secondary {
      border-radius: 20px;
      margin-left: 10px;
    }

    .form-row {
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

<div class="header-box">
  Update Polis Asuransi Kendaraan
</div>

<div class="container-box">
  <form action="<?= base_url('polis/update/' . $polis['id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
      <label for="nama_tertanggung">Nama Tertanggung</label>
      <input type="text" class="form-control" id="nama_tertanggung" name="nama_tertanggung" value="<?= $polis['nama_tertanggung'] ?>" required>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="tanggal_efektif">Tanggal Efektif</label>
        <input type="date" class="form-control" id="tanggal_efektif" name="tanggal_efektif" value="<?= $polis['tanggal_efektif'] ?>" required>
      </div>
      <div class="form-group col-md-6">
        <label for="tanggal_expired">Tanggal Expired</label>
        <input type="date" class="form-control" id="tanggal_expired" name="tanggal_expired" value="<?= $polis['tanggal_expired'] ?>" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="merek_kendaraan">Merk Kendaraan</label>
        <input type="text" class="form-control" id="merek_kendaraan" name="merek_kendaraan" value="<?= $polis['merek_kendaraan'] ?>" required>
      </div>
      <div class="form-group col-md-6">
        <label for="tipe_kendaraan">Tipe Kendaraan</label>
        <input type="text" class="form-control" id="tipe_kendaraan" name="tipe_kendaraan" value="<?= $polis['tipe_kendaraan'] ?>" required>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="tahun_kendaraan">Tahun Kendaraan</label>
        <input type="text" class="form-control" id="tahun_kendaraan" name="tahun_kendaraan" value="<?= $polis['tahun_kendaraan'] ?>" required>
      </div>
      <div class="form-group col-md-4">
        <label for="harga_kendaraan">Harga Kendaraan</label>
        <input type="number" class="form-control" id="harga_kendaraan" name="harga_kendaraan" value="<?= $polis['harga_kendaraan'] ?>" required>
      </div>
      <div class="form-group col-md-4">
        <label for="rate_premi">Rate Premi (%)</label>
        <input type="number" class="form-control" id="rate_premi" name="rate_premi" value="<?= $polis['rate_premi'] ?>" required>
      </div>
    </div>

    <div class="text-center mt-4">
      <button type="submit" class="btn btn-update">Update</button>
      <a href="<?= base_url('polis') ?>" class="btn btn-secondary">Kembali</a>
    </div>
  </form>
</div>

</body>
</html>
