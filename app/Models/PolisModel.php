<?php

namespace App\Models;

use CodeIgniter\Model;

class PolisModel extends Model
{
    protected $table      = 'polis'; 
    protected $primaryKey = 'id';          
    protected $allowedFields = [
        'nomor_polis', 
        'nama_tertanggung', 
        'tanggal_efektif', 
        'tanggal_expired', 
        'merek_kendaraan', 
        'tipe_kendaraan', 
        'tahun_kendaraan', 
        'harga_kendaraan', 
        'rate_premi', 
        'harga_premi'
    ];
}
