<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableGuests extends Migration
{
	public function up()
	{
       $this->forge->addField([
			'id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
				'auto_increment' => true,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'phone' => [
				'type' => 'VARCHAR',
				'constraint' => 20,
				'null' => true,
			],
			'facebook' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			'created_at' => [
				'type' => 'DATETIME DEFAULT CURRENT_TIMESTAMP',
			],
			'updated_at' => [
				'type' => 'DATETIME ON UPDATE CURRENT_TIMESTAMP',
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('guests');
	}

	public function down()
	{
		$this->forge->dropTable('guests');
	}
}
