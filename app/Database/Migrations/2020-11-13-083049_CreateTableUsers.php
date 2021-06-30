<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUsers extends Migration
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
			'account' => [
				'type' => 'VARCHAR',
				'constraint' => 60,
				'null' => true,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => 80,
				'null' => true,
			],
			'avatar' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			],
			'phone' => [
				'type' => 'VARCHAR',
				'constraint' => 20,
				'null' => true,
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'role' => [
				'type' => 'VARCHAR',
				'constraint' => 20,
				'default' => 'member',
			],
			'permissions' => [
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
		$this->forge->addUniqueKey('email');
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
