<?php

namespace App\Controllers;

use App\Models\RolesModel;
use App\Models\UsersModel;

class AdminDashboard extends BaseController
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
            'title' => 'Donor Darah ~ Admin | Dashboard',
            'menu' => 'dashboard',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role'))
        ];

        return view('admin/index', $data);
    }
}
