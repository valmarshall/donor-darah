<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BloodDonor extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'id_blood_group'       => [
				'type'       => 'INT',
				'constraint' => 11,
			],
			'nik'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'nama'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'tempat_lahir'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'tanggal_lahir'       => [
				'type'       => 'DATE',
			],
			'alamat'       => [
				'type'       => 'LONGTEXT',
			],
			'nohp'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'image'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'password'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'status_aktif'       => [
				'type'       => 'INT',
				'constraint' => 1,
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'updated_at' => [
				'type' => 'DATETIME'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('blood_donor');
	}

	public function down()
	{
		//
	}
}
