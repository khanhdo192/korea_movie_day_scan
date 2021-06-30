<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableQRCode extends Migration
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
			'movie_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'guest_id' => [
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => true,
			],
			'token' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
				'null' => true,
			],
			'send_at' => [
				'type' => 'DATETIME',
			],
			'actived_at' => [
				'type' => 'DATETIME',
			],
			'created_at' => [
				'type' => 'DATETIME DEFAULT CURRENT_TIMESTAMP',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('qrcodes');
	}

	public function down()
	{
		$this->forge->dropTable('qrcodes');
	}
}
