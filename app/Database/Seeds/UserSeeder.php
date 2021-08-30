<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'id_role' => 1,
			'username' => 'superadmin',
			'password' => password_hash('superadmin123', PASSWORD_DEFAULT),
			'nama' => 'Super Admin',
			'email' => 'superadmin@gmail.com',
			'image' => 'default.png',
			'tempat_lahir' => 'Sorong',
			'tanggal_lahir' => '1997-08-04',
			'bio' => null,
			'created_at' => date('Y-m-d H:m:s', strtotime(time())),
			'updated_at' => date('Y-m-d H:m:s', strtotime(time())),
		];

		$this->db->table('admin_users')->insert($data);
	}
}
