<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLokasi extends Model
{
    protected $table = 'tbl_lokasi'; // atau nama tabel yang benar

    //fungsi insert data
    public function insertData($data)
    {
        $this->db->table('tbl_lokasi')->insert($data);
    }

    //fungsi mengambil seluruh data
    public function getAllData()
    {
        return $this->db->table('tbl_lokasi')
            ->select('id_lokasi, nama_lokasi, alamat_lokasi, latitude, longitude, foto_lokasi')
            ->get()->getResultArray();
    }
    
    //fungsi mengambil data berdasarkan ID
    public function getDataById($id_lokasi)
    {
        return $this->db->table('tbl_lokasi')
            ->where('id_lokasi', $id_lokasi)
            ->get()->getRowArray();
    }

    //fungsi insert data
    public function updateData($data)
    {
        $this->db->table('tbl_lokasi')
        ->where('id_lokasi',$data['id_lokasi'])
        ->update($data);
    }

    //fungsi delete data
    public function deleteData($data)
    {
        $this->db->table('tbl_lokasi')
        ->where('id_lokasi',$data['id_lokasi'])
        ->delete($data);
    }
}
