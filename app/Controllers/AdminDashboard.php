<?php

namespace App\Controllers;

class AdminDashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Dashboard',
            'menu' => 'dashboard'
        ];

        return view('admin/index', $data);
    }
}
