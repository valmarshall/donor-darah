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

    public function edit($slug)
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Edit Blood Group',
            'menu' => 'blood-group',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role')),
            'validation' => \config\Services::validation(),
            'bloodGroup' => $this->bloodGroupModel->getBloodGroup($slug)
        ];

        return view('admin/bloodgroup/edit', $data);
    }

    public function update()
    {
        $data = [
            'id' => $this->request->getVar('id'),
            'oldGroupName' => $this->request->getVar('oldGroupName'),
            'groupName' => $this->request->getVar('groupName'),
            'slug' => $this->request->getVar('slug'),
        ];

        if ($data['oldGroupName'] == $data['groupName']) {
            $ruleGroupName = 'required';
        } else {
            $ruleGroupName = 'required|is_unique[blood_group.blood_group]';
        }

        if (!$this->validate([
            'groupName' => $ruleGroupName
        ])) {
            return redirect()->to('/admin/blood-group/edit/' . $data['slug'])->withInput();
        }

        $slug = url_title($data['groupName'], '-', true);

        $this->bloodGroupModel->save([
            'id' => $data['id'],
            'blood_group' => $data['groupName'],
            'slug' => $slug
        ]);

        session()->setFlashdata('message', 'Group edited successfully');

        return redirect()->to('/admin/blood-group');
    }

    public function delete($id)
    {
        $this->bloodGroupModel->delete($id);

        session()->setFlashdata('message', 'Group deleted successfully');

        return redirect()->to('/admin/blood-group');
    }
}
