<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class PembelajaranSQL extends Controller
{
    public function dasar()
    {
        $db = \Config\Database::connect();

        // =================== Contoh 1: SELECT ===================
        $query1 = "SELECT * FROM polis;";
        $result1 = $db->query($query1)->getResultArray();
        $desc1 = "SELECT digunakan untuk mengambil data dari tabel. <br>
                  <strong>Syntax:</strong> SELECT [kolom] FROM [tabel];<br>
                  Jika menggunakan *, maka akan mengambil semua kolom.";

        // =================== Contoh 2: WHERE ===================
        $query2 = "SELECT * FROM polis WHERE tahun_kendaraan = 2020;";
        $result2 = $db->query($query2)->getResultArray();
        $desc2 = "WHERE digunakan untuk memfilter data berdasarkan kondisi tertentu.<br>
                  <strong>Syntax:</strong> SELECT [kolom] FROM [tabel] WHERE [kondisi];";

        // =================== Contoh 3: ORDER BY ===================
        $query3 = "SELECT * FROM polis ORDER BY harga_kendaraan DESC;";
        $result3 = $db->query($query3)->getResultArray();
        $desc3 = "ORDER BY digunakan untuk mengurutkan hasil query.<br>
                  <strong>Syntax:</strong> SELECT [kolom] FROM [tabel] ORDER BY [kolom] ASC/DESC;";

        // =================== Contoh 4: LIMIT ===================
        $query4 = "SELECT * FROM polis LIMIT 2;";
        $result4 = $db->query($query4)->getResultArray();
        $desc4 = "LIMIT digunakan untuk membatasi jumlah data yang ditampilkan.<br>
                  <strong>Syntax:</strong> SELECT [kolom] FROM [tabel] LIMIT [jumlah];";

        // =================== Contoh 5: DISTINCT ===================
        $query5 = "SELECT DISTINCT tahun_kendaraan FROM polis;";
        $result5 = $db->query($query5)->getResultArray();
        $desc5 = "DISTINCT digunakan untuk mengambil data yang unik (tidak duplikat).<br>
                  <strong>Syntax:</strong> SELECT DISTINCT [kolom] FROM [tabel];";

        $data = [
            'bab' => 'Dasar',
            'examples' => [
                [
                    'query' => $query1,
                    'result' => $result1,
                    'description' => $desc1
                ],
                [
                    'query' => $query2,
                    'result' => $result2,
                    'description' => $desc2
                ],
                [
                    'query' => $query3,
                    'result' => $result3,
                    'description' => $desc3
                ],
                [
                    'query' => $query4,
                    'result' => $result4,
                    'description' => $desc4
                ],
                [
                    'query' => $query5,
                    'result' => $result5,
                    'description' => $desc5
                ]
            ]
        ];

        return view('pembelajaran_sql', $data);
    }

        public function agregasi()
    {
        $db = \Config\Database::connect();

        // =================== Contoh 1: COUNT ===================
        $query1 = "SELECT COUNT(*) AS total_polis FROM polis;";
        $result1 = $db->query($query1)->getResultArray();
        $desc1 = "COUNT() digunakan untuk menghitung jumlah baris data dalam tabel.<br>
                <strong>Syntax:</strong> SELECT COUNT(*) FROM [tabel];<br>
                <strong>Penjelasan:</strong> Berguna untuk menghitung jumlah data yang tersimpan di tabel.";

        // =================== Contoh 2: SUM ===================
        $query2 = "SELECT SUM(harga_premi) AS total_premi FROM polis;";
        $result2 = $db->query($query2)->getResultArray();
        $desc2 = "SUM() digunakan untuk menghitung total nilai dari sebuah kolom.<br>
                <strong>Syntax:</strong> SELECT SUM([kolom]) FROM [tabel];<br>
                <strong>Penjelasan:</strong> Berguna untuk menghitung total pembayaran, total transaksi, dsb.";

        // =================== Contoh 3: AVG ===================
        $query3 = "SELECT AVG(harga_premi) AS rata_rata_premi FROM polis;";
        $result3 = $db->query($query3)->getResultArray();
        $desc3 = "AVG() digunakan untuk menghitung rata-rata nilai dari sebuah kolom.<br>
                <strong>Syntax:</strong> SELECT AVG([kolom]) FROM [tabel];<br>
                <strong>Penjelasan:</strong> Cocok untuk mencari rata-rata harga, nilai, dsb.";

        // =================== Contoh 4: MIN & MAX ===================
        $query4 = "SELECT MIN(harga_premi) AS premi_terkecil, MAX(harga_premi) AS premi_terbesar FROM polis;";
        $result4 = $db->query($query4)->getResultArray();
        $desc4 = "MIN() dan MAX() digunakan untuk mencari nilai terkecil dan terbesar dalam kolom.<br>
                <strong>Syntax:</strong> SELECT MIN([kolom]), MAX([kolom]) FROM [tabel];";

        // =================== Contoh 5: GROUP BY ===================
        $query5 = "SELECT tahun_kendaraan, COUNT(*) AS jumlah_kendaraan 
                    FROM polis 
                    GROUP BY tahun_kendaraan;";
        $result5 = $db->query($query5)->getResultArray();
        $desc5 = "GROUP BY digunakan untuk mengelompokkan data berdasarkan kolom tertentu.<br>
                <strong>Syntax:</strong> SELECT [kolom], AGG_FUNC() FROM [tabel] GROUP BY [kolom];<br>
                <strong>Penjelasan:</strong> Misalnya, menghitung jumlah kendaraan per tahun.";

        // =================== Contoh 6: HAVING ===================
        $query6 = "SELECT id_polis, SUM(jumlah_bayar) AS total_bayar 
                    FROM pembayaran 
                    GROUP BY id_polis 
                    HAVING total_bayar > 4000000;";
        $result6 = $db->query($query6)->getResultArray();
        $desc6 = "HAVING digunakan untuk memfilter hasil setelah proses GROUP BY.<br>
                <strong>Syntax:</strong> SELECT [kolom], AGG_FUNC() FROM [tabel] GROUP BY [kolom] HAVING [kondisi];<br>
                <strong>Penjelasan:</strong> WHERE tidak bisa digunakan setelah GROUP BY, maka pakai HAVING.";

        $data = [
            'bab' => 'Agregasi & Grouping',
            'examples' => [
                ['query' => $query1, 'result' => $result1, 'description' => $desc1],
                ['query' => $query2, 'result' => $result2, 'description' => $desc2],
                ['query' => $query3, 'result' => $result3, 'description' => $desc3],
                ['query' => $query4, 'result' => $result4, 'description' => $desc4],
                ['query' => $query5, 'result' => $result5, 'description' => $desc5],
                ['query' => $query6, 'result' => $result6, 'description' => $desc6]
            ]
        ];

        return view('pembelajaran_sql', $data);
    }

        public function join()
        {
            $db = \Config\Database::connect();

            // =================== Contoh 1: INNER JOIN ===================
            $query1 = "SELECT p.nomor_polis, p.nama_tertanggung, b.tanggal_bayar, b.jumlah_bayar 
                        FROM pembayaran b 
                        INNER JOIN polis p ON b.id_polis = p.id;";
            $result1 = $db->query($query1)->getResultArray();
            $desc1 = "INNER JOIN menampilkan data yang hanya memiliki relasi di kedua tabel.<br>
                    <strong>Contoh Kasus:</strong> Tampilkan hanya polis yang sudah melakukan pembayaran.<br>
                    <strong>Syntax:</strong> 
                    SELECT [kolom] FROM [tabel1] 
                    INNER JOIN [tabel2] ON [kondisi_relasi];";

            // =================== Contoh 2: LEFT JOIN ===================
            $query2 = "SELECT p.nomor_polis, p.nama_tertanggung, b.tanggal_bayar, b.jumlah_bayar 
                        FROM polis p 
                        LEFT JOIN pembayaran b ON p.id = b.id_polis;";
            $result2 = $db->query($query2)->getResultArray();
            $desc2 = "LEFT JOIN akan menampilkan SEMUA data dari tabel polis, meskipun tidak ada pembayaran.<br>
                    <strong>Contoh Kasus:</strong> Tampilkan semua polis, walau belum ada pembayarannya.<br>
                    <strong>Syntax:</strong> 
                    SELECT [kolom] FROM [tabel1] 
                    LEFT JOIN [tabel2] ON [kondisi_relasi];";

            // =================== Contoh 3: RIGHT JOIN ===================
            $query3 = "SELECT p.nomor_polis, p.nama_tertanggung, b.tanggal_bayar, b.jumlah_bayar 
                        FROM polis p 
                        RIGHT JOIN pembayaran b ON p.id = b.id_polis;";
            $result3 = $db->query($query3)->getResultArray();
            $desc3 = "RIGHT JOIN akan menampilkan semua data dari tabel pembayaran, 
                    meskipun tidak ada data polis yang sesuai.<br>
                    <strong>Contoh Kasus:</strong> Cari data pembayaran, meski polisnya tidak ditemukan (biasanya error data).";

            // =================== Contoh 4: FULL OUTER JOIN (Simulasi) ===================
            $query4 = "SELECT p.nomor_polis, p.nama_tertanggung, b.tanggal_bayar, b.jumlah_bayar 
                        FROM polis p 
                        LEFT JOIN pembayaran b ON p.id = b.id_polis
                        UNION
                        SELECT p.nomor_polis, p.nama_tertanggung, b.tanggal_bayar, b.jumlah_bayar 
                        FROM polis p 
                        RIGHT JOIN pembayaran b ON p.id = b.id_polis;";
            $result4 = $db->query($query4)->getResultArray();
            $desc4 = "FULL OUTER JOIN tidak didukung langsung oleh MySQL, 
                    tapi bisa disimulasikan menggunakan LEFT JOIN + RIGHT JOIN + UNION.<br>
                    <strong>Contoh Kasus:</strong> Tampilkan semua data, baik yang ada relasinya atau tidak.";

            $data = [
                'bab' => 'Relasi Tabel (JOIN)',
                'examples' => [
                    ['query' => $query1, 'result' => $result1, 'description' => $desc1],
                    ['query' => $query2, 'result' => $result2, 'description' => $desc2],
                    ['query' => $query3, 'result' => $result3, 'description' => $desc3],
                    ['query' => $query4, 'result' => $result4, 'description' => $desc4],
                ]
            ];

            return view('pembelajaran_sql', $data);
        }

        public function subquery()
        {
            $db = \Config\Database::connect();

            // =================== Contoh 1: Subquery di WHERE ===================
            $query1 = "SELECT * FROM polis 
                        WHERE id IN (SELECT id_polis FROM pembayaran WHERE jumlah_bayar > 4000000);";
            $result1 = $db->query($query1)->getResultArray();
            $desc1 = "Subquery di bagian WHERE.<br>
                    <strong>Contoh Kasus:</strong> Tampilkan polis yang memiliki pembayaran lebih dari 4.000.000.<br>
                    <strong>Syntax:</strong> 
                    SELECT ... FROM ... WHERE kolom IN (SUBQUERY);";

            // =================== Contoh 2: Subquery di SELECT ===================
            $query2 = "SELECT p.nomor_polis, 
                            (SELECT SUM(jumlah_bayar) FROM pembayaran WHERE id_polis = p.id) AS total_pembayaran 
                        FROM polis p;";
            $result2 = $db->query($query2)->getResultArray();
            $desc2 = "Subquery di bagian SELECT.<br>
                    <strong>Contoh Kasus:</strong> Tampilkan nomor polis dan total pembayaran masing-masing polis.<br>
                    <strong>Syntax:</strong> 
                    SELECT ..., (SUBQUERY) AS alias FROM ...;";

            // =================== Contoh 3: Subquery di FROM ===================
            $query3 = "SELECT sub.id_polis, sub.total_bayar 
                        FROM (SELECT id_polis, SUM(jumlah_bayar) AS total_bayar 
                            FROM pembayaran 
                            GROUP BY id_polis) AS sub 
                        WHERE sub.total_bayar > 4000000;";
            $result3 = $db->query($query3)->getResultArray();
            $desc3 = "Subquery di bagian FROM (disebut juga Derived Table).<br>
                    <strong>Contoh Kasus:</strong> Cari polis yang total pembayarannya lebih dari 4.000.000.<br>
                    <strong>Syntax:</strong> 
                    SELECT ... FROM (SUBQUERY) AS alias WHERE ...;";

            $data = [
                'bab' => 'Subquery & Nested Query',
                'examples' => [
                    ['query' => $query1, 'result' => $result1, 'description' => $desc1],
                    ['query' => $query2, 'result' => $result2, 'description' => $desc2],
                    ['query' => $query3, 'result' => $result3, 'description' => $desc3],
                ]
            ];

            return view('pembelajaran_sql', $data);
        }

        public function manipulasi()
        {
            $db = \Config\Database::connect();

            // =================== Contoh 1: INSERT ===================
            $query1 = "INSERT INTO polis (nomor_polis, nama_tertanggung, tahun_kendaraan, tanggal_efektif, tanggal_expired, merek_kendaraan, tipe_kendaraan, harga_kendaraan, rate_premi, harga_premi)
                        VALUES ('POL-TEST', 'Test User', 2023, '2025-01-01', '2026-01-01', 'TestCar', 'Sedan', 250000000, 2.5, 6250000);";
            $desc1 = "INSERT digunakan untuk menambahkan data ke dalam tabel.<br>
                    <strong>Syntax:</strong> INSERT INTO [tabel] (kolom1, kolom2, ...) VALUES (nilai1, nilai2, ...);";

            // =================== Contoh 2: UPDATE ===================
            $query2 = "UPDATE polis 
                        SET nama_tertanggung = 'Updated User' 
                        WHERE nomor_polis = 'POL-TEST';";
            $desc2 = "UPDATE digunakan untuk memperbarui data yang sudah ada di tabel.<br>
                    <strong>Syntax:</strong> UPDATE [tabel] SET kolom = nilai WHERE kondisi;";

            // =================== Contoh 3: DELETE ===================
            $query3 = "DELETE FROM polis 
                        WHERE nomor_polis = 'POL-TEST';";
            $desc3 = "DELETE digunakan untuk menghapus data dari tabel.<br>
                    <strong>Syntax:</strong> DELETE FROM [tabel] WHERE kondisi;";

            // ⚠️ Catatan: Untuk keamanan, kita hanya tampilkan query-nya tanpa dieksekusi langsung.
            $result1 = $result2 = $result3 = [['Perhatikan! Operasi manipulasi data tidak dieksekusi otomatis. Jalankan query ini secara manual jika dibutuhkan.']];

            $data = [
                'bab' => 'Manipulasi Data',
                'examples' => [
                    ['query' => $query1, 'result' => $result1, 'description' => $desc1],
                    ['query' => $query2, 'result' => $result2, 'description' => $desc2],
                    ['query' => $query3, 'result' => $result3, 'description' => $desc3],
                ]
            ];

            return view('pembelajaran_sql', $data);
        }

        public function advanced()
        {
            $db = \Config\Database::connect();

            // =================== Contoh 1: LIKE ===================
            $query1 = "SELECT * FROM polis WHERE nama_tertanggung LIKE '%udi%';";
            $result1 = $db->query($query1)->getResultArray();
            $desc1 = "LIKE digunakan untuk mencari data dengan pola tertentu.<br>
                    <strong>Contoh Kasus:</strong> Cari nama yang mengandung kata 'udi'.<br>
                    <strong>Syntax:</strong> SELECT * FROM [tabel] WHERE [kolom] LIKE '%pola%';";

            // =================== Contoh 2: IN ===================
            $query2 = "SELECT * FROM polis WHERE tahun_kendaraan IN (2020, 2021);";
            $result2 = $db->query($query2)->getResultArray();
            $desc2 = "IN digunakan untuk mencari data yang nilainya ada di dalam daftar.<br>
                    <strong>Contoh Kasus:</strong> Cari polis dengan tahun kendaraan 2020 atau 2021.<br>
                    <strong>Syntax:</strong> SELECT * FROM [tabel] WHERE [kolom] IN (nilai1, nilai2, ...);";

            // =================== Contoh 3: BETWEEN ===================
            $query3 = "SELECT * FROM polis WHERE harga_premi BETWEEN 5000000 AND 10000000;";
            $result3 = $db->query($query3)->getResultArray();
            $desc3 = "BETWEEN digunakan untuk mencari data dalam rentang nilai.<br>
                    <strong>Contoh Kasus:</strong> Cari polis dengan premi antara 5 juta sampai 10 juta.<br>
                    <strong>Syntax:</strong> SELECT * FROM [tabel] WHERE [kolom] BETWEEN nilai1 AND nilai2;";

            // =================== Contoh 4: UNION ===================
            $query4 = "SELECT nomor_polis FROM polis 
                        UNION 
                        SELECT id_polis FROM pembayaran;";
            $result4 = $db->query($query4)->getResultArray();
            $desc4 = "UNION digunakan untuk menggabungkan hasil dua query.<br>
                    <strong>Catatan:</strong> UNION akan menghapus data duplikat secara default.<br>
                    <strong>Syntax:</strong> SELECT ... UNION SELECT ...;";

            // =================== Contoh 5: VIEW ===================
            $query5 = "CREATE OR REPLACE VIEW view_total_pembayaran AS 
                        SELECT id_polis, SUM(jumlah_bayar) AS total_bayar 
                        FROM pembayaran 
                        GROUP BY id_polis;";
            $desc5 = "VIEW adalah virtual table yang berisi hasil query.<br>
                    <strong>Contoh Kasus:</strong> Buat view untuk menampilkan total pembayaran per polis.<br>
                    <strong>Syntax:</strong> CREATE VIEW [nama_view] AS (query);";

            $result5 = [['Perhatian! VIEW ini tidak dieksekusi otomatis untuk mencegah konflik. Jalankan secara manual jika diperlukan.']];

            $data = [
                'bab' => 'Advanced Topics',
                'examples' => [
                    ['query' => $query1, 'result' => $result1, 'description' => $desc1],
                    ['query' => $query2, 'result' => $result2, 'description' => $desc2],
                    ['query' => $query3, 'result' => $result3, 'description' => $desc3],
                    ['query' => $query4, 'result' => $result4, 'description' => $desc4],
                    ['query' => $query5, 'result' => $result5, 'description' => $desc5],
                ]
            ];

            return view('pembelajaran_sql', $data);
        }

        public function tambahan()
        {
            $db = \Config\Database::connect();

            // =================== Contoh 1: Aliasing (AS) ===================
            $query1 = "SELECT nomor_polis AS NoPolis, nama_tertanggung AS Tertanggung FROM polis;";
            $result1 = $db->query($query1)->getResultArray();
            $desc1 = "Aliasing (AS) digunakan untuk memberi nama kolom atau tabel sementara yang lebih mudah dibaca.<br>
                    <strong>Syntax:</strong> SELECT [kolom] AS [alias] FROM [tabel];";

            // =================== Contoh 2: CASE WHEN (Conditional Query) ===================
            $query2 = "SELECT nomor_polis, 
                            CASE 
                                WHEN harga_premi > 10000000 THEN 'High'
                                WHEN harga_premi BETWEEN 5000000 AND 10000000 THEN 'Medium'
                                ELSE 'Low'
                            END AS kategori_premi
                        FROM polis;";
            $result2 = $db->query($query2)->getResultArray();
            $desc2 = "CASE WHEN digunakan untuk membuat kondisi IF di dalam query.<br>
                    <strong>Syntax:</strong> 
                    CASE WHEN kondisi THEN hasil ELSE hasil_lain END AS [alias];";

            // =================== Contoh 3: IS NULL & IS NOT NULL ===================
            $query3 = "SELECT * FROM polis WHERE tanggal_expired IS NULL;";
            $result3 = $db->query($query3)->getResultArray();
            $desc3 = "IS NULL dan IS NOT NULL digunakan untuk memeriksa apakah kolom berisi NULL atau tidak.<br>
                    <strong>Syntax:</strong> 
                    WHERE [kolom] IS NULL / IS NOT NULL;";

            // =================== Contoh 4: LIMIT & OFFSET ===================
            $query4 = "SELECT * FROM polis LIMIT 2 OFFSET 2;";
            $result4 = $db->query($query4)->getResultArray();
            $desc4 = "LIMIT & OFFSET digunakan untuk mengambil data dengan paginasi.<br>
                    <strong>Contoh:</strong> Ambil 2 data, mulai dari data ke-3.<br>
                    <strong>Syntax:</strong> 
                    SELECT * FROM [tabel] LIMIT [jumlah] OFFSET [posisi_awal];";

            $data = [
                'bab' => 'Topik Tambahan Penting',
                'examples' => [
                    ['query' => $query1, 'result' => $result1, 'description' => $desc1],
                    ['query' => $query2, 'result' => $result2, 'description' => $desc2],
                    ['query' => $query3, 'result' => $result3, 'description' => $desc3],
                    ['query' => $query4, 'result' => $result4, 'description' => $desc4],
                ]
            ];

            return view('pembelajaran_sql', $data);
        }

    
}
