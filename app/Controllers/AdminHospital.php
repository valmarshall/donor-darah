<?php

namespace App\Controllers;

use App\Models\HospitalModel;
use App\Models\RolesModel;
use App\Models\UsersModel;

class AdminHospital extends BaseController
{
    protected $userModels;
    protected $roleModels;
    protected $hospitalModel;

    public function __construct()
    {
        $this->userModels = new UsersModel();
        $this->roleModels = new RolesModel();
        $this->hospitalModel = new HospitalModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Hospital',
            'menu' => 'hospital',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role')),
            'hospital' => $this->hospitalModel->getHospital()
        ];

        return view('admin/hospital/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Add New Hospital',
            'menu' => 'hospital',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role')),
            'validation' => \config\Services::validation(),
        ];

        return view('admin/hospital/add', $data);
    }

    public function save()
    {
        $data = [
            'hospital' => $this->request->getVar('hospital'),
            'address' => $this->request->getVar('address'),
            'map' => $this->request->getVar('map'),
            'slug' => url_title($this->request->getVar('hospital'), '-', true)
        ];

        if (!$this->validate([
            'hospital' => 'required|is_unique[hospital.hospital]',
            'address' => 'required'
        ])) {
            return redirect()->to('/admin/hospital/add')->withInput();
        }

        $mapURL = explode('"', $data['map']);

        $this->hospitalModel->save([
            'hospital' => $data['hospital'],
            'slug' => $data['slug'],
            'address' => $data['address'],
            'map' => $mapURL[1]
        ]);

        session()->setFlashdata('message', 'Hospital added successfully');

        return redirect()->to('/admin/hospital');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Add New Hospital',
            'menu' => 'hospital',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role')),
            'validation' => \config\Services::validation(),
            'hospital' => $this->hospitalModel->getHospital($slug)
        ];

        return view('admin/hospital/edit', $data);
    }

    public function update()
    {
        $data = [
            'id' => $this->request->getVar('id'),
            'oldSlug' => $this->request->getVar('slug'),
            'hospital' => $this->request->getVar('hospital'),
            'address' => $this->request->getVar('address'),
            'map' => $this->request->getVar('map'),
        ];
        $checkHospital = $this->hospitalModel->getHospital($data['oldSlug']);

        if ($checkHospital['hospital'] == $data['hospital']) {
            $ruleHospital = 'required';
        } else {
            $ruleHospital = 'required|is_unique[hospital.hospital]';
        }

        if (!$this->validate([
            'hospital' => $ruleHospital,
            'address' => 'required',
        ])) {
            return redirect()->to('/admin/hospital/edit/' . $data['oldSlug'])->withInput();
        }

        $slug = url_title($data['hospital'], '-', true);
        $mapURL = explode('"', $data['map']);

        $this->hospitalModel->save([
            'id' => $data['id'],
            'hospital' => $data['hospital'],
            'slug' => $slug,
            'address' => $data['address'],
            'map' => $mapURL[1]
        ]);

        session()->setFlashdata('message', 'Hospital edited successfully');

        return redirect()->to('/admin/hospital');
    }

    public function delete($id)
    {
        $this->hospitalModel->delete($id);

        session()->setFlashdata('message', 'Hospital deleted successfully');

        return redirect()->to('/admin/hospital');
    }
}
