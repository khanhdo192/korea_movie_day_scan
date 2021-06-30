<?php namespace App\Controllers\Backend;

use App\Controllers\MyController;

class Login extends MyController
{
	public function __construct()
	{
		parent::__construct();
		$this->assets = array(
			'css' => [
				'assets/backend/styles/app.css',
				'assets/backend/styles/auth.css'
			],
			'js' => [
				'assets/backend/scripts/app.js',
				'assets/backend/scripts/auth.js',
			],
			'html' => [
				'backend/login'
			],
		);
		$this->ajaxUrl = [
			'login' => base_url('api/auth/login'),
		];
	}
	
	public function index()
	{
		/* Default */
		$data = array();
		$default = $this->default;
		
		/* Meta Tag */
		$data['metaTitle'] = 'Đăng nhập - '. $default['siteName'];
		
		$data = $this->dataUnion($data);
		return view('index', $data);
	}
}