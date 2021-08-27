<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BloodGroup extends Migration
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
			'blood_group'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'slug'       => [
				'type'       => 'VARCHAR',
				'constraint' => '255',
			],
			'created_at' => [
				'type' => 'DATETIME'
			],
			'updated_at' => [
				'type' => 'DATETIME'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('blood_group');
	}

	public function down()
	{
		//
	}
}
