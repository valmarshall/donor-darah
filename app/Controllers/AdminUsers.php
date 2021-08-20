<?php

namespace App\Controllers;

use App\Models\UsersModel;

class AdminUsers extends BaseController
{
    protected $userModels;

    public function __construct()
    {
        $this->userModels = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Users',
            'menu' => 'users',
            'users' => $this->userModels->getUser()
        ];

        return view('admin/users/index', $data);
    }
}
