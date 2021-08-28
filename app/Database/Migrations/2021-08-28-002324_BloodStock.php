<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BloodStock extends Migration
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
			'id_donor' => [
				'type' => 'INT',
				'constraint' => 11
			],
			'created_at' => [
				'type' => 'datetime'
			],
			'updated_at' => [
				'type' => 'datetime'
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('blood_stock');
	}

	public function down()
	{
		//
	}
}
