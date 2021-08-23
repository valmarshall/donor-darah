<?php

namespace App\Controllers;

use App\Models\RolesModel;
use App\Models\UsersModel;

class AdminUsers extends BaseController
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
            'title' => 'Donor Darah ~ Admin | Users',
            'menu' => 'users',
            'users' => $this->userModels->getUser(),
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role'))
        ];

        return view('admin/users/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Add User',
            'menu' => 'users',
            'roles' => $this->roleModels->getRole(),
            'validation' => \config\Services::validation(),
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role'))
        ];

        return view('admin/users/add', $data);
    }

    public function save()
    {
        $password = $this->request->getVar('password');

        if ($password) {
            $rules = [
                'username' => 'required|is_unique[admin_users.username]|alpha_dash|min_length[5]',
                'name' => 'required',
                'email' => 'required|valid_email',
                'role' => 'required',
                'birthPlace' => 'required',
                'birthDay' => 'required',
                'password' => 'required|min_length[6]|alpha_dash|matches[rePassword]',
                'rePassword' => 'required|min_length[6]|alpha_dash|matches[password]'
            ];

            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $rules = [
                'username' => 'required|is_unique[admin_users.username]|alpha_dash|min_length[5]',
                'name' => 'required',
                'email' => 'required|valid_email',
                'role' => 'required',
                'birthPlace' => 'required',
                'birthDay' => 'required',
            ];

            $hashPassword = password_hash(date('Ymd', strtotime($this->request->getVar('birthDay'))), PASSWORD_DEFAULT);
        }

        if (!$this->validate($rules)) {
            return redirect()->to('/admin/users/add')->withInput();
        }

        $this->userModels->save([
            'id_role' => $this->request->getVar('role'),
            'username' => $this->request->getVar('username'),
            'password' => $hashPassword,
            'nama' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'image' => 'default.png',
            'tempat_lahir' => $this->request->getVar('birthPlace'),
            'tanggal_lahir' => $this->request->getVar('birthDay'),
        ]);

        session()->setFlashdata('message', 'User added successfully');

        return redirect()->to('/admin/users');
    }

    public function edit($username)
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Edit User',
            'menu' => 'users',
            'roles' => $this->roleModels->getRole(),
            'users' => $this->userModels->getUser($username),
            'validation' => \config\Services::validation(),
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role'))
        ];

        return view('admin/users/edit', $data);
    }

    public function update()
    {
        $data = [
            'id' => $this->request->getVar('id'),
            'oldUsername' => $this->request->getVar('oldUsername'),
            'username' => $this->request->getVar('username'),
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'role' => $this->request->getVar('role'),
            'birthPlace' => $this->request->getVar('birthPlace'),
            'birthDay' => $this->request->getVar('birthDay')
        ];

        if ($data['oldUsername'] == $data['username']) {
            $usernameRule = 'required|alpha_dash|min_length[5]';
        } else {
            $usernameRule = 'required|is_unique[admin_users.username]|alpha_dash|min_length[5]';
        }

        if (!$this->validate([
            'username' => $usernameRule,
            'name' => 'required',
            'email' => 'required|valid_email',
            'role' => 'required',
            'birthPlace' => 'required',
            'birthDay' => 'required',
        ])) {
            return redirect()->to('/admin/users/edit/' . $data['oldUsername'])->withInput();
        }

        $this->userModels->save([
            'id' => $data['id'],
            'username' => $data['username'],
            'nama' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'tempat_lahir' => $data['birthPlace'],
            'tanggal_lahir' => $data['birthDay'],
        ]);

        session()->setFlashdata('message', 'User edited successfully');

        return redirect()->to('/admin/users');
    }

    public function delete($id)
    {
        $this->userModels->delete($id);

        session()->setFlashdata('message', 'User deleted successfully');

        return redirect()->to('/admin/users');
    }
}
