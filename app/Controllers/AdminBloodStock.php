<?php

namespace App\Controllers;

use App\Models\RolesModel;
use App\Models\UsersModel;

class AdminBloodStock extends BaseController
{
    protected $userModels;
    protected $roleModels;

    public function __construct()
    {
        $this->userModels = new UsersModel();
        $this->roleModels = new RolesModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Blood Stock',
            'menu' => 'blood-stock',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role'))
        ];

        return view('admin/bloodstock/index', $data);
    }
}
