<?php

namespace App\Controllers;

use App\Models\BloodNeederModel;
use App\Models\RolesModel;
use App\Models\UsersModel;

class AdminBloodNeeder extends BaseController
{
    protected $userModels;
    protected $roleModels;
    protected $bloodNeederModel;

    public function __construct()
    {
        $this->userModels = new UsersModel();
        $this->roleModels = new RolesModel();
        $this->bloodNeederModel = new BloodNeederModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Needing Blood',
            'menu' => 'blood-need',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role')),
            'bloodNeeder' => $this->bloodNeederModel->getBloodeNeeder()
        ];

        return view('admin/bloodneeder/index', $data);
    }
}
