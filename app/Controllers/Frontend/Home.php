<?php namespace App\Controllers\Frontend;

use App\Controllers\MyController;

class Home extends MyController
{
	public function __construct()
	{
		parent::__construct();
		$this->assets = array(
			'css' => [
				'assets/frontend/styles/home.css',
			],
			'js' => [
				'assets/frontend/scripts/home.js',
			],
			'html' => [
				'frontend/home'
			],
		);
		$this->ajaxUrl = [
			
		];
	}
	
	public function index()
	{
		/* Default */
		$data = array();
		$default = $this->default;
		
		/* Meta Tag */
		$data['metaTitle'] = 'Home - '. $default['siteName'];

        $this->assets['html'] = ['frontend/home/index'];
		
		$data = $this->dataUnion($data);
		return view('frontend/index', $data);
	}
}