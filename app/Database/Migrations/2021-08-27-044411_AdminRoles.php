<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdminRoles extends Migration
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
			'role'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'slug' => [
				'type' => 'varchar',
				'constraint' => '255'
			],
			'created_at' => [
				'type' => 'datetime'
			],
			'updated_at' => [
				'type' => 'datetime'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('admin_roles');
	}

	public function down()
	{
		//
	}
}
