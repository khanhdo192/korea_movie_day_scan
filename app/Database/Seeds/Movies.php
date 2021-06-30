<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Movies extends Seeder
{	
	public function run()
	{
		$data = [
			[
				'name_vi' => 'Nghề Siêu Khó',
				'name_en' => 'Extreme Job',
				'location' => 'CGV Vincom Đà Nẵng',
				'address' => 'Tầng 4, TTTM Vincom Đà Nẵng, Đường Ngô Quyền, Phường An Hải Bắc, Quận Sơn Trà, Thành phố Đà Nẵng',
				'started_at' => '2021-04-17 14:00:00',
			],
			[
				'name_vi' => 'Cục Nợ Hóa Cục Cưng',
				'name_en' => 'Pawn',
				'location' => 'CGV Vincom Đà Nẵng',
				'address' => 'Tầng 4, TTTM Vincom Đà Nẵng, Đường Ngô Quyền, Phường An Hải Bắc, Quận Sơn Trà, Thành phố Đà Nẵng',
				'started_at' => '2021-04-18 14:00:00',
			],
			[
				'name_vi' => 'Nghề Siêu Khó',
				'name_en' => 'Extreme Job',
				'location' => 'CGV Vincom Xuân Khánh',
				'address' => 'Tầng 5, Tòa nhà 209, Đường 30/4, Phường Xuân Khánh, Quận Ninh Kiều, Thành phố Cần Thơ',
				'started_at' => '2021-04-25 14:00:00',
			],
			[
				'name_vi' => 'Kẻ Săn Mộ',
				'name_en' => 'Collectors',
				'location' => 'CGV Vincom Xuân Khánh',
				'address' => 'Tầng 5, Tòa nhà 209, Đường 30/4, Phường Xuân Khánh, Quận Ninh Kiều, Thành phố Cần Thơ',
				'started_at' => '2021-04-25 16:00:00',
			],
		];

		// Using Query Builder
		$this->db->table('movies')->insertBatch($data);
	}
}