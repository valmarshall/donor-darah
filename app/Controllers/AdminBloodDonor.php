<?php

namespace App\Controllers;

use App\Models\BloodDonorModel;
use App\Models\BloodGroupModel;
use App\Models\RolesModel;
use App\Models\UsersModel;

class AdminBloodDonor extends BaseController
{
    protected $userModels;
    protected $roleModels;
    protected $bloodDonorModel;
    protected $bloodGroupModel;

    public function __construct()
    {
        $this->userModels = new UsersModel();
        $this->roleModels = new RolesModel();
        $this->bloodDonorModel = new BloodDonorModel();
        $this->bloodGroupModel = new BloodGroupModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Blood Donor',
            'menu' => 'blood-donor',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role')),
            'bloodDonor' => $this->bloodDonorModel->getBloodDonor(),
        ];

        return view('admin/blooddonor/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Blood Donor',
            'menu' => 'blood-donor',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role')),
            'bloodGroup' => $this->bloodGroupModel->getBloodGroup(),
            'validation' => \config\Services::validation(),
        ];

        return view('admin/blooddonor/add', $data);
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
            'phoneNumber' => $this->request->getVar('phoneNumber'),
            'password' => $this->request->getVar('password'),
            'rePassword' => $this->request->getVar('rePassword')
        ];

        if ($data['password']) {
            $rules = [
                'nik' => 'required|is_unique[blood_donor.nik]|numeric|exact_length[16]',
                'name' => 'required',
                'birthPlace' => 'required',
                'birthDay' => 'required',
                'bloodGroup' => 'required',
                'address' => 'required',
                'phoneNumber' => 'required|numeric',
                'password' => 'required|min_length[6]|alpha_dash|matches[rePassword]',
                'rePassword' => 'required|min_length[6]|alpha_dash|matches[password]'
            ];

            $password = $data['password'];
        } else {
            $rules = [
                'nik' => 'required|is_unique[blood_donor.nik]|numeric|exact_length[16]',
                'name' => 'required',
                'birthPlace' => 'required',
                'birthDay' => 'required',
                'bloodGroup' => 'required',
                'address' => 'required',
                'phoneNumber' => 'required|numeric',
            ];

            $password = date('Ymd', strtotime($data['birthDay']));
        }

        if (!$this->validate($rules)) {
            return redirect()->to('/admin/blood-donor/add')->withInput();
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $this->bloodDonorModel->save([
            'id_blood_group' => $data['bloodGroup'],
            'nik' => $data['nik'],
            'nama' => $data['name'],
            'tempat_lahir' => $data['birthPlace'],
            'tanggal_lahir' => $data['birthDay'],
            'alamat' => $data['address'],
            'nohp' => $data['phoneNumber'],
            'image' => 'default.png',
            'password' => $hash,
            'status_aktif' => '1'
        ]);

        session()->setFlashdata('message', 'Donor added successfully');

        return redirect()->to('/admin/blood-donor');
    }
}
