<?php

namespace App\Controllers;

use App\Models\BloodGroupModel;
use App\Models\BloodNeederModel;
use App\Models\RolesModel;
use App\Models\UsersModel;

class AdminBloodNeeder extends BaseController
{
    protected $userModels;
    protected $roleModels;
    protected $bloodNeederModel;
    protected $bloodGroupModel;

    public function __construct()
    {
        $this->userModels = new UsersModel();
        $this->roleModels = new RolesModel();
        $this->bloodNeederModel = new BloodNeederModel();
        $this->bloodGroupModel = new BloodGroupModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Needing Blood',
            'menu' => 'blood-needer',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role')),
            'bloodNeeder' => $this->bloodNeederModel->getBloodeNeeder(),
            'bloodGroup' => $this->bloodGroupModel->getBloodGroup()
        ];

        return view('admin/bloodneeder/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Needing Blood',
            'menu' => 'blood-needer',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role')),
            'bloodGroup' => $this->bloodGroupModel->getBloodGroup(),
            'validation' => \config\Services::validation(),
        ];

        return view('admin/bloodneeder/add', $data);
    }

    public function save()
    {
        $data = [
            'nik' => $this->request->getVar('nik'),
            'name' => $this->request->getVar('name'),
            'birthPlace' => $this->request->getVar('birthPlace'),
            'birthDay' => $this->request->getVar('birthDay'),
            'bloodGroup' => $this->request->getVar('bloodGroup'),
            'address' => $this->request->getVar('address'),
            'district' => $this->request->getVar('district'),
            'city' => $this->request->getVar('city'),
            'province' => $this->request->getVar('province'),
            'country' => $this->request->getVar('country'),
            'gender' => $this->request->getVar('gender'),
            'religion' => $this->request->getVar('religion')
        ];

        if (!$this->validate([
            'nik' => 'required|is_unique[blood_needer.nik]|numeric|exact_length[16]',
            'name' => 'required',
            'birthPlace' => 'required',
            'birthDay' => 'required',
            'bloodGroup' => 'required',
            'address' => 'required',
            'district' => 'required',
            'city' => 'required',
            'province' => 'required',
            'country' => 'required',
            'gender' => 'required',
        ])) {
            return redirect()->to('/admin/blood-needer/add')->withInput();
        }

        $this->bloodNeederModel->save([
            'id_blood_group' => $data['bloodGroup'],
            'nik' => $data['nik'],
            'nama' => $data['name'],
            'tempat_lahir' => $data['birthPlace'],
            'tanggal_lahir' => $data['birthDay'],
            'alamat' => $data['address'],
            'kota' => $data['city'],
            'provinsi' => $data['province'],
            'kecamatan' => $data['district'],
            'negara' => $data['country'],
            'jenis_kelamin' => $data['gender'],
            'agama' => $data['religion'],
            'status' => 0
        ]);

        session()->setFlashdata('message', 'Data added successfully');

        return redirect()->to('/admin/blood-needer');
    }
}
