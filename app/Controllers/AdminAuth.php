<?php

namespace App\Controllers;

use App\Models\UsersModel;

class AdminAuth extends BaseController
{
    protected $userModels;

    public function __construct()
    {
        $this->userModels = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Login',
            'menu' => 'login'
        ];

        return view('admin/auth/index', $data);
    }

    public function login()
    {
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password')
        ];
        $user = $this->userModels->getUser($data['username']);

        $sessTry = session()->getTempdata('try');

        if ($sessTry <= 3) {
            if ($user) {
                if (password_verify($data['password'], $user['password'])) {
                    $sessionData = [
                        'username' => $data['username'],
                        'role' => $user['id_role']
                    ];

                    session()->set($sessionData);
                    session()->removeTempdata('try');

                    return redirect()->to('/admin');
                } else {
                    $sessTry += 1;

                    session()->setTempdata('try', $sessTry, 300);
                    session()->setFlashdata('message', 'Wrong Password!');

                    return redirect()->to('/admin/login')->withInput();
                }
            } else {
                $sessTry += 1;

                session()->setTempdata('try', $sessTry, 300);
                session()->setFlashdata('message', 'Username is not registered!');

                return redirect()->to('/admin/login')->withInput();
            }
        } else {
            session()->setFlashdata('message', 'You have failed to login 3 times, please try again in a few minutes!');

            return redirect()->to('/admin/login')->withInput();
        }
    }
}
