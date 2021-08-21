<?php

namespace App\Controllers;

use App\Models\RolesModel;

class AdminRoles extends BaseController
{
    protected $roleModels;

    public function __construct()
    {
        $this->roleModels = new RolesModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Roles',
            'menu' => 'roles',
            'roles' => $this->roleModels->getRole()
        ];

        return view('admin/roles/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Add Roles',
            'menu' => 'roles',
            'validation' => \config\Services::validation(),
        ];

        return view('admin/roles/add', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'role' => 'required|is_unique[admin_roles.role]'
        ])) {
            return redirect()->to('/admin/roles/add')->withInput();
        }

        $data = [
            'role' => $this->request->getVar('role')
        ];
        $slug = url_title($data['role'], '-', true);

        $this->roleModels->save([
            'role' => $data['role'],
            'slug' => $slug
        ]);

        session()->setFlashdata('message', 'Role added successfully');

        return redirect()->to('/admin/roles');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Edit Roles',
            'menu' => 'roles',
            'validation' => \config\Services::validation(),
            'roles' => $this->roleModels->getRole($slug)
        ];

        return view('admin/roles/edit', $data);
    }

    public function update()
    {
        $data = [
            'role' => $this->request->getVar('role'),
            'oldRole' => $this->request->getVar('oldRole'),
            'idRole' => $this->request->getVar('idRole')
        ];
        $slug = url_title($data['role'], '-', true);

        if ($data['oldRole'] == $data['role']) {
            $roleRules = 'required';
        } else {
            $roleRules = 'required|is_unique[admin_roles.role]';
        }

        if (!$this->validate([
            'role' => $roleRules
        ])) {
            return redirect()->to('/admin/roles/add')->withInput();
        }

        $this->roleModels->save([
            'id' => $data['idRole'],
            'role' => $data['role'],
            'slug' => $slug
        ]);

        session()->setFlashdata('message', 'Role edited successfully');

        return redirect()->to('/admin/roles');
    }

    public function delete($id)
    {
        $this->roleModels->delete($id);

        session()->setFlashdata('message', 'Role deleted successfully');

        return redirect()->to('/admin/roles');
    }
}
