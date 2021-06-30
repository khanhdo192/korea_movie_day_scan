<?php namespace App\Controllers\Backend;

use App\Controllers\MyController;

class Profile extends MyController
{
	public function __construct()
	{
		parent::__construct();
		$this->assets = array(
			'css' => [
				'assets/backend/styles/profile.css'
			],
			'html' => [
				'backend/profile'
			],
		);
	}
	
	public function index()
	{
		/* Default */
		$data = array();
		$default = $this->default;
		
		/* Meta Tag */
		$data['metaTitle'] = 'Trang cá nhân - '. $default['siteName'];
		
		$data = $this->dataUnion($data);
		return view('backend/index', $data);
	}
}