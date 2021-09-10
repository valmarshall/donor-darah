<?php

namespace App\Controllers;

use App\Models\BloodGroupModel;
use App\Models\BloodNeederModel;
use App\Models\HospitalModel;

class Home extends BaseController
{

	protected $bloodGroupModel;
	protected $bloodNeederModel;
	protected $hospitalModel;

	public function __construct()
	{
		$this->bloodGroupModel = new BloodGroupModel();
		$this->bloodNeederModel = new BloodNeederModel();
		$this->hospitalModel = new HospitalModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Donor Darah | Home',
			'bloodGroup' => $this->bloodGroupModel->getBloodGroup()
		];

		return view('home', $data);
	}

	public function bloodGroup($slug)
	{
		$data = [
			'title' => 'Donor Darah | Blood Type',
			'bloodGroup' => $this->bloodGroupModel->getBloodGroup($slug),
			'bloodNeeder' => $this->bloodNeederModel->getBloodeNeeder()
		];

		return view('bloodGroup', $data);
	}

	public function donorNeededDetail($nik)
	{
		$bloodNeeder = $this->bloodNeederModel->getBloodeNeeder($nik);
		$bloodGroup = $this->bloodGroupModel->find($bloodNeeder['id_blood_group']);
		$hospital = $this->hospitalModel->find($bloodNeeder['id_hospital']);
		$data = [
			'title' => 'Donor Darah | Donor Needed',
			'bloodNeeder' => $bloodNeeder,
			'bloodGroup' => $bloodGroup,
			'hospital' => $hospital
		];

		return view('bloodNeeded', $data);
	}
}
