<?php

namespace App\Controllers;

use App\Models\BloodDonorModel;
use App\Models\BloodGroupModel;
use App\Models\BloodNeederModel;
use App\Models\BloodStockModel;
use App\Models\HospitalModel;
use App\Models\RolesModel;
use App\Models\UsersModel;

class AdminBloodNeeder extends BaseController
{
    protected $userModels;
    protected $roleModels;
    protected $bloodNeederModel;
    protected $bloodGroupModel;
    protected $bloodStockModel;
    protected $bloodDonorModel;
    protected $hospitalModel;

    public function __construct()
    {
        $this->userModels = new UsersModel();
        $this->roleModels = new RolesModel();
        $this->bloodNeederModel = new BloodNeederModel();
        $this->bloodGroupModel = new BloodGroupModel();
        $this->bloodStockModel = new BloodStockModel();
        $this->bloodDonorModel = new BloodDonorModel();
        $this->hospitalModel = new HospitalModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Needing Blood',
            'menu' => 'blood-needer',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role')),
            'bloodNeeder' => $this->bloodNeederModel->getBloodeNeeder(),
            'bloodGroup' => $this->bloodGroupModel->getBloodGroup(),
            'bloodStock' => $this->bloodStockModel->findAll(),
            'bloodDonor' => $this->bloodDonorModel->getBloodDonor()
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
            'hospital' => $this->hospitalModel->getHospital(),
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
            'religion' => $this->request->getVar('religion'),
            'hospital' => $this->request->getVar('hospital')
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
            'hospital' => 'required'
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
            'status' => 0,
            'id_hospital' => $data['hospital']
        ]);

        session()->setFlashdata('message', 'Data added successfully');

        return redirect()->to('/admin/blood-needer');
    }

    public function changestatus($type)
    {
        if ($type == 'use') {
            $this->bloodStockModel->save([
                'id' => $this->request->getVar('idStock'),
                'status' => 1,
                'donored_to' => $this->request->getVar('idNeeder')
            ]);

            $this->bloodNeederModel->save([
                'id' => $this->request->getVar('idNeeder'),
                'status' => 1,
                'donored_by' => $this->request->getVar('idDonor')
            ]);
        } elseif ($type == 'cancel') {
            $bloodStock = $this->bloodStockModel->where(['donored_to' => $this->request->getVar('idNeeder')])->first();

            $this->bloodNeederModel->save([
                'id' => $this->request->getVar('idNeeder'),
                'status' => 0,
                'donored_by' => null
            ]);

            $this->bloodStockModel->save([
                'id' => $bloodStock['id'],
                'status' => 0,
                'donored_to' => null
            ]);
        } else {
            $this->bloodNeederModel->save([
                'id' => $this->request->getVar('idNeeder'),
                'status' => 2
            ]);
        }

        return redirect()->to('/admin/blood-needer');
    }
}
