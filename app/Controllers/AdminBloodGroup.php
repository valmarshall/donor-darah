<?php

namespace App\Controllers;

use App\Models\BloodGroupModel;
use App\Models\RolesModel;
use App\Models\UsersModel;

class AdminBloodGroup extends BaseController
{
    protected $userModels;
    protected $roleModels;
    protected $bloodGroupModel;

    public function __construct()
    {
        $this->userModels = new UsersModel();
        $this->roleModels = new RolesModel();
        $this->bloodGroupModel = new BloodGroupModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Blood Group',
            'menu' => 'blood-group',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role')),
            'bloodGroup' => $this->bloodGroupModel->getBloodGroup()
        ];

        return view('admin/bloodgroup/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Add New Blood Group',
            'menu' => 'blood-group',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role')),
            'validation' => \config\Services::validation(),
        ];

        return view('admin/bloodgroup/add', $data);
    }

    public function save()
    {
        $data = [
            'groupName' => $this->request->getVar('groupName')
        ];

        if (!$this->validate([
            'groupName' => 'required|is_unique[blood_group.blood_group]'
        ])) {
            return redirect()->to('/admin/blood-group/add')->withInput();
        }

        $slug = url_title($data['groupName'], '-', true);

        $this->bloodGroupModel->save([
            'blood_group' => $data['groupName'],
            'slug' => $slug
        ]);

        session()->setFlashdata('message', 'Group added successfully');

        return redirect()->to('/admin/blood-group');
    }
}
