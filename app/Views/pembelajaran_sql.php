<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pembelajaran SQL - Bab <?= $bab; ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        pre { background: #f4f4f4; padding: 10px; border: 1px solid #ddd; }
        h3 { color: #333; }
        hr { margin: 30px 0; }
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
<nav style="margin-bottom: 20px;">
    <strong>Navigasi Bab:</strong><br>
    <button onclick="location.href='/pembelajaran_sql/dasar'">Bab 1: Query Dasar</button>
    <button onclick="location.href='/pembelajaran_sql/agregasi'">Bab 2: Agregasi & Grouping</button>
    <button onclick="location.href='/pembelajaran_sql/join'">Bab 3: Relasi Tabel (JOIN)</button>
    <button onclick="location.href='/pembelajaran_sql/subquery'">Bab 4: Subquery & Nested Query</button>
    <button onclick="location.href='/pembelajaran_sql/manipulasi'">Bab 5: Manipulasi Data</button>
    <button onclick="location.href='/pembelajaran_sql/advanced'">Bab 6: Advanced Data</button>
    <button onclick="location.href='/pembelajaran_sql/tambahan'">Bab 7: Tambahan</button>
</nav>
<hr>
<body>
    <h2>Pembelajaran SQL - Bab <?= $bab; ?></h2>

    <?php foreach ($examples as $index => $ex): ?>
        <h3>Contoh Query <?= $index + 1; ?></h3>
        <p><strong>Penjelasan:</strong><br><?= $ex['description']; ?></p>
        <pre><?= $ex['query']; ?></pre>

        <h4>Hasil Output:</h4>
        <table>
            <tr>
                <?php if (!empty($ex['result'])): ?>
                    <?php foreach (array_keys($ex['result'][0]) as $col): ?>
                        <th><?= ucfirst(str_replace('_', ' ', $col)); ?></th>
                    <?php endforeach; ?>
                <?php else: ?>
                    <th>Data Kosong</th>
                <?php endif; ?>
            </tr>
            <?php if (!empty($ex['result'])): ?>
                <?php foreach ($ex['result'] as $row): ?>
                    <tr>
                        <?php foreach ($row as $cell): ?>
                            <td><?= $cell; ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="100%">Tidak ada data ditampilkan.</td></tr>
            <?php endif; ?>
        </table>
        <hr>
    <?php endforeach; ?>

</body>
</html>
