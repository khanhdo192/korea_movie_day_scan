<?php namespace App\Controllers\Backend;

use App\Controllers\MyController;

class Home extends MyController
{
	public function __construct()
	{
		parent::__construct();
		$this->assets = array(
			'html' => [
				'backend/home'
			],
		);
	}
	
	public function index()
	{
		/* Default */
		$data = array();
		$default = $this->default;

		$data = $this->dataUnion($data);
		return view('backend/index', $data);
	}
}