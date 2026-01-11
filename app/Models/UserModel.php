<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Pastikan ini sesuai dengan nama tabel di database
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'username', 'fullname', 'user_image', 'password']; // Sesuaikan dengan kolom tabel

    

    //fungsi delete data
    public function deleteData($data)
    {
        return $this->where('id', $data['id'])->delete();
    }

}
