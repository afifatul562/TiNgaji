<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $perPage = 10;
        $users = $this->UserModel->select('id, username, email')->paginate($perPage);
        $pager = $this->UserModel->pager;
        $data = [
            'judul' => 'User List',
            'page' => 'v_user_list',
            'users' => $users,
            'pager' => $pager,
        ];
        return view('v_template', $data);
    }

    public function deleteUser($id) {
        $userModel = new UserModel();
        $userModel->deleteData(['id' => $id]);
        //notifikasi data berhasil disimpan
        session()->setFlashdata('pesan','Data User Berhasil di Delete !!!');
        return redirect()->to('User/index');
    }

}
