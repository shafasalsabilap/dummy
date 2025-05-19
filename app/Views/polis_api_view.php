<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Polis API</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Daftar Polis (REST API)</h2>
    <div class="text-right mb-3">
        <a href="/api-view/create.html" class="btn btn-primary">Tambah Data</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Polis</th>
                <th>Nama Tertanggung</th>
                <th>Harga Premi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="data-polis"></tbody>
    </table>
</div>

<script>
fetch('http://localhost:8080/api/polis')
    .then(response => response.json())
    .then(data => {
        const tbody = document.getElementById('data-polis');
        tbody.innerHTML = '';
        data.forEach((item, index) => {
            tbody.innerHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${item.nomor_polis}</td>
                    <td>${item.nama_tertanggung}</td>
                    <td>Rp ${item.harga_premi.toLocaleString('id-ID')}</td>
                    <td>
                        <a href="/api-view/edit.html?id=${item.id}" class="btn btn-warning btn-sm">Edit</a>
                        <button onclick="hapusData(${item.id})" class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>`;
        });
    });

function hapusData(id) {
    if (confirm('Yakin ingin hapus data?')) {
        fetch(`http://localhost:8080/api/polis/${id}`, {
            method: 'DELETE'
        })
        .then(() => location.reload());
    }
}
</script>
</body>
</html>
