<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableMovies extends Migration
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
			'name_vi' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			'name_en' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			'location' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			'address' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			'started_at' => [
				'type' => 'DATETIME',
			],
			'created_at' => [
				'type' => 'DATETIME DEFAULT CURRENT_TIMESTAMP',
			],
			'updated_at' => [
				'type' => 'DATETIME ON UPDATE CURRENT_TIMESTAMP',
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('movies');
	}

	public function down()
	{
		$this->forge->dropTable('movies');
	}
}
