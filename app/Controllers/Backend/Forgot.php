<?php namespace App\Controllers\Backend;

use App\Controllers\MyController;

class Forgot extends MyController
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
				'backend/forgot'
			],		
		);
	}
	
	public function index()
	{
		/* Default */
		$data = array();
		$default = $this->default;
		
		/* Meta Tag */
		$data['metaTitle'] = 'Quên mật khẩu - '. $default['siteName'];
		
		$data = $this->dataUnion($data);
		echo view('index', $data);
	}
}