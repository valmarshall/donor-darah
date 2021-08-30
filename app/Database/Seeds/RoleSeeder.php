<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use function PHPSTORM_META\map;

class RoleSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'superAdmin' => [
				'role' => 'Super Administrator',
				'slug' => url_title('Super Administrator', '-', true),
				'created_at' => date('Y-m-d H:m:s', strtotime(time())),
				'updated_at' => date('Y-m-d H:m:s', strtotime(time())),
			],
			'admin' => [
				'role' => 'Administrator',
				'slug' => url_title('Administrator', '-', true),
				'created_at' => date('Y-m-d H:m:s', strtotime(time())),
				'updated_at' => date('Y-m-d H:m:s', strtotime(time())),
			],
			'bloodManager' => [
				'role' => 'Blood Manager',
				'slug' => url_title('Blood Manager', '-', true),
				'created_at' => date('Y-m-d H:m:s', strtotime(time())),
				'updated_at' => date('Y-m-d H:m:s', strtotime(time())),
			],
		];

		$this->db->table('admin_roles')->insert($data['superAdmin']);
		$this->db->table('admin_roles')->insert($data['admin']);
		$this->db->table('admin_roles')->insert($data['bloodManager']);
	}
}
