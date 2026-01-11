<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        $data['title'] = 'User List';
        $users = new \Myth\Auth\Models\UserModel();
        $data['users'] = $users->findAll();
        return view('admin/index', $data);
    }
}