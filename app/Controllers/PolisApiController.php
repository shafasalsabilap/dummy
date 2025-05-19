<?php

namespace App\Controllers;
use App\Models\PolisModel;
use CodeIgniter\RESTful\ResourceController;

class PolisApiController extends ResourceController
{
    protected $modelName = 'App\Models\PolisModel';
    protected $format = 'json';

    // GET /api/polis
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /api/polis/{id}
    public function show($id = null)
    {
        $polis = $this->model->find($id);
        if (!$polis) return $this->failNotFound('Polis tidak ditemukan.');
        return $this->respond($polis);
    }

    // POST /api/polis
    public function create()
    {
        $json = $this->request->getJSON();
        if (!$json) return $this->fail('Request body tidak valid.');

        $harga_premi = $json->harga_kendaraan * ($json->rate_premi / 100);
        $date = date('Ymd');
        $last = $this->model->orderBy('id', 'DESC')->first();
        $urutan = $last ? ($last['id'] + 1) : 1;
        $nomor_polis = 'POL' . $date . '-' . str_pad($urutan, 3, '0', STR_PAD_LEFT);

        $data = [
            'nomor_polis' => $nomor_polis,
            'nama_tertanggung' => $json->nama_tertanggung,
            'tanggal_efektif' => $json->tanggal_efektif,
            'tanggal_expired' => $json->tanggal_expired,
            'merek_kendaraan' => $json->merek_kendaraan,
            'tipe_kendaraan' => $json->tipe_kendaraan,
            'tahun_kendaraan' => $json->tahun_kendaraan,
            'harga_kendaraan' => $json->harga_kendaraan,
            'rate_premi' => $json->rate_premi,
            'harga_premi' => $harga_premi
        ];

        $this->model->insert($data);
        return $this->respondCreated(['status' => 'success', 'data' => $data]);
    }

    // PUT /api/polis/{id}
    public function update($id = null)
    {
        $json = $this->request->getJSON();
        if (!$json) return $this->fail('Request body tidak valid.');

        $harga_premi = $json->harga_kendaraan * ($json->rate_premi / 100);
        $data = [
            'nama_tertanggung' => $json->nama_tertanggung,
            'tanggal_efektif' => $json->tanggal_efektif,
            'tanggal_expired' => $json->tanggal_expired,
            'merek_kendaraan' => $json->merek_kendaraan,
            'tipe_kendaraan' => $json->tipe_kendaraan,
            'tahun_kendaraan' => $json->tahun_kendaraan,
            'harga_kendaraan' => $json->harga_kendaraan,
            'rate_premi' => $json->rate_premi,
            'harga_premi' => $harga_premi
        ];

        $this->model->update($id, $data);
        return $this->respond(['status' => 'success', 'message' => 'Polis diupdate.', 'data' => $data]);
    }

    // DELETE /api/polis/{id}
    public function delete($id = null)
    {
        $polis = $this->model->find($id);
        if (!$polis) return $this->failNotFound('Polis tidak ditemukan.');

        $this->model->delete($id);
        return $this->respondDeleted(['status' => 'success', 'message' => 'Polis dihapus.']);
    }
}
