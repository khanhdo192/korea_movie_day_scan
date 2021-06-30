<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Users extends Seeder
{
	private $_password = 'dad5d8ef9a78c5a522308c21c1b8ac12edc58491';
	
	public function run()
	{
		$data = [
			[
				'account' => 'admin',
				'name' => 'Administrator',
				'email' => 'admin@breadntea.vn',
				'password' => $this->_password,
				'role' => 'admin',
			],
			[
				'account' => 'hainm',
				'name' => 'HaiNM',
				'email' => 'hainm@breadntea.vn',
				'password' => $this->_password,
				'role' => 'admin',
			],
			[
				'account' => 'khanhdq',
				'name' => 'KhanhDQ',
				'email' => 'khanhdq@breadntea.vn',
				'password' => $this->_password,
				'role' => 'admin',
			]
		];

		// Using Query Builder
		$this->db->table('users')->insertBatch($data);
	}
}