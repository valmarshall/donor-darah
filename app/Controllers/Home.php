<?php

namespace App\Controllers;

use App\Models\BloodGroupModel;
use App\Models\BloodNeederModel;

class Home extends BaseController
{

	protected $bloodGroupModel;
	protected $bloodNeederModel;

	public function __construct()
	{
		$this->bloodGroupModel = new BloodGroupModel();
		$this->bloodNeederModel = new BloodNeederModel();
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
			'title' => 'Donor Darah | Home',
			'bloodGroup' => $this->bloodGroupModel->getBloodGroup($slug),
			'bloodNeeder' => $this->bloodNeederModel->getBloodeNeeder()
		];

		return view('bloodGroup', $data);
	}
}
