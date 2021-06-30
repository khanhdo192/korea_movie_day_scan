<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Guests extends Seeder
{	
	public function run()
	{
		/*$data = [
			[
				'name' => null,
				'email' => 'thanhtan@pro-hub.com.vn',
				'phone' => null,
				'facebook' => null,
			],
			[
				'name' => null,
				'email' => 'thuha165@gmail.com',
				'phone' => null,
				'facebook' => null,
			],
			[
				'name' => null,
				'email' => 'nguyenanhtuan@breadntea.vn',
				'phone' => null,
				'facebook' => null,
			],
			[
				'name' => null,
				'email' => 'nguyenminhhai@breadntea.vn',
				'phone' => null,
				'facebook' => null,
			],
			[
				'name' => null,
				'email' => 'nguyenbinhlong@breadntea.vn',
				'phone' => null,
				'facebook' => null,
			],
			[
				'name' => null,
				'email' => 'test-yhpesntop@srv1.mail-tester.com',
				'phone' => null,
				'facebook' => null,
			],
		]; */
		
		$data = [
			[
				'name' => null,
				'email' => 'hainm0912@gmail.com',
				'phone' => null,
				'facebook' => null,
			]
		];
		
		// Using Query Builder
		$this->db->table('guests')->insertBatch($data);
	}
}