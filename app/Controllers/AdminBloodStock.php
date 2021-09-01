<?php

namespace App\Controllers;

use App\Models\BloodDonorModel;
use App\Models\BloodGroupModel;
use App\Models\BloodStockModel;
use App\Models\RolesModel;
use App\Models\UsersModel;

class AdminBloodStock extends BaseController
{
    protected $userModels;
    protected $roleModels;
    protected $bloodStockModel;
    protected $bloodGroupModel;
    protected $bloodDonorModel;

    public function __construct()
    {
        $this->userModels = new UsersModel();
        $this->roleModels = new RolesModel();
        $this->bloodStockModel = new BloodStockModel();
        $this->bloodGroupModel = new BloodGroupModel();
        $this->bloodDonorModel = new BloodDonorModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Blood Stock',
            'menu' => 'blood-stock',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role')),
            'bloodStock' => $this->bloodStockModel->findAll(),
            'bloodGroup' => $this->bloodGroupModel->getBloodGroup()
        ];

        return view('admin/bloodstock/index', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Add Blood Stock',
            'menu' => 'blood-stock',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role')),
            'bloodStock' => $this->bloodStockModel->findAll(),
            'bloodGroup' => $this->bloodGroupModel->getBloodGroup(),
            'bloodDonor' => $this->bloodDonorModel->getBloodDonor(),
            'validation' => \config\Services::validation(),
        ];

        return view('admin/bloodstock/add', $data);
    }

    public function save()
    {
        $data = [
            'bloodGroup' => $this->request->getVar('bloodType'),
            'bloodDonor' => $this->request->getVar('bloodDonor')
        ];

        if (!$this->validate([
            'bloodType' => 'required',
            'bloodDonor' => 'required'
        ])) {
            return redirect()->to('/admin/blood-stock/add')->withInput();
        }

        $this->bloodStockModel->save([
            'id_blood_group' => $data['bloodGroup'],
            'id_donor' => $data['bloodDonor'],
            'status' => 0
        ]);

        session()->setFlashdata('message', 'Stock added successfully');

        return redirect()->to('/admin/blood-stock');
    }

    public function detail($idBloodGroup)
    {
        $data = [
            'title' => 'Donor Darah ~ Admin | Detail Blood Stock',
            'menu' => 'blood-stock',
            'me' => $this->userModels->getUser(session()->get('username')),
            'myRole' => $this->roleModels->find(session()->get('id_role')),
            'bloodStock' => $this->bloodStockModel->getBloodStockByGroup($idBloodGroup),
            'bloodGroup' => $this->bloodGroupModel->find($idBloodGroup),
            'bloodDonor' => $this->bloodDonorModel->getBloodDonor(),
            'validation' => \config\Services::validation(),
        ];

        return view('admin/bloodstock/detail', $data);
    }
}
