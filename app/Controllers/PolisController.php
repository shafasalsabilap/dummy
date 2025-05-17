<?php

namespace App\Controllers;

use App\Models\PolisModel;

class PolisController extends BaseController
{
    public function index()
    {
        $model = new PolisModel();

       
        $data['polis'] = $model->findAll();
        
        return view('polis_view', $data);
    }

    public function create()
    {
        return view('polis_form');
    }

    public function store()
    {
        $model = new \App\Models\PolisModel();

        $harga_kendaraan = $this->request->getPost('harga_kendaraan');
        $rate_premi = $this->request->getPost('rate_premi');
        $harga_premi = $harga_kendaraan * ($rate_premi / 100);

        // Generate nomor polis otomatis
        $date = date('Ymd');
        $last = $model->orderBy('id', 'DESC')->first();
        $urutan = $last ? ($last['id'] + 1) : 1;
        $nomor_polis = 'POL' . $date . '-' . str_pad($urutan, 3, '0', STR_PAD_LEFT);

        $model->insert([
            'nomor_polis' => $nomor_polis,
            'nama_tertanggung' => $this->request->getPost('nama_tertanggung'),
            'tanggal_efektif' => $this->request->getPost('tanggal_efektif'),
            'tanggal_expired' => $this->request->getPost('tanggal_expired'),
            'merek_kendaraan' => $this->request->getPost('merek_kendaraan'),
            'tipe_kendaraan' => $this->request->getPost('tipe_kendaraan'),
            'tahun_kendaraan' => $this->request->getPost('tahun_kendaraan'),
            'harga_kendaraan' => $harga_kendaraan,
            'rate_premi' => $rate_premi,
            'harga_premi' => $harga_premi
        ]);

        return redirect()->to('/polis');
    }

    // Fungsi untuk menampilkan form edit
    public function edit($id)
    {
        $model = new PolisModel();
        
        // Mengambil data polis berdasarkan ID
        $data['polis'] = $model->find($id);
        
        // Jika data polis tidak ditemukan, arahkan kembali ke daftar polis
        if (!$data['polis']) {
            return redirect()->to('/polis')->with('error', 'Polis tidak ditemukan');
        }

        // Menampilkan form edit dengan data polis
        return view('polis_edit', $data);
    }

    // Fungsi untuk mengupdate data polis
    public function update($id)
    {
        $model = new PolisModel();

        // Ambil data dari form
        $harga_kendaraan = $this->request->getPost('harga_kendaraan');
        $rate_premi = $this->request->getPost('rate_premi');
        $harga_premi = $harga_kendaraan * ($rate_premi / 100);

        // Update data polis di database
        $model->update($id, [
            'nama_tertanggung' => $this->request->getPost('nama_tertanggung'),
            'tanggal_efektif' => $this->request->getPost('tanggal_efektif'),
            'tanggal_expired' => $this->request->getPost('tanggal_expired'),
            'merek_kendaraan' => $this->request->getPost('merek_kendaraan'),
            'tipe_kendaraan' => $this->request->getPost('tipe_kendaraan'),
            'tahun_kendaraan' => $this->request->getPost('tahun_kendaraan'),
            'harga_kendaraan' => $harga_kendaraan,
            'rate_premi' => $rate_premi,
            'harga_premi' => $harga_premi
        ]);

        // Arahkan kembali ke daftar polis dengan pesan sukses
        return redirect()->to('/polis')->with('success', 'Polis berhasil diperbarui');
    }

    public function delete($id)
{
    // Load model
    $model = new PolisModel();

    // Cek apakah data dengan ID tersebut ada
    $polis = $model->find($id);
    if (!$polis) {
        // Jika tidak ditemukan, beri pesan error
        return redirect()->to('/polis')->with('error', 'Polis tidak ditemukan');
    }

    // Menghapus data berdasarkan ID
    $model->delete($id);

    // Beri pesan sukses setelah penghapusan
    return redirect()->to('/polis')->with('success', 'Polis berhasil dihapus');
}

}
