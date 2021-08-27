<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdminUsers extends Migration
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
			'id_role'       => [
				'type'       => 'INT',
				'constraint' => 11,
			],
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'nama' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'image' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'tempat_lahir' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'tanggal_lahir' => [
				'type' => 'DATE'
			],
			'bio' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => true
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'updated_at' => [
				'type' => 'DATETIME'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('admin_users');
	}

	public function down()
	{
		//
	}
}
