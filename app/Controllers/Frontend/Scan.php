<?php namespace App\Controllers\Frontend;

use App\Controllers\MyController;
use App\Models\QRcodes as QRcodeModel;

class Scan extends MyController
{
	public function __construct()
	{
		parent::__construct();
		$this->assets = array(
			'css' => [
				'assets/frontend/styles/scan.css',
			],
			'js' => [
				'assets/frontend/scripts/scan.js',
			],
			'html' => [
				'frontend/scan'
			],
		);
		$this->ajaxUrl = array(
			'active' => base_url('api/qrcode/active'),
			'isActive' => base_url('api/qrcode/is-active'),
		);
	}
	
	public function index()
	{
		/* Default */
		$data = array();
		$default = $this->default;
		
		/* Meta Tag */
		$data['metaTitle'] = 'QR Scan Info - '. $default['siteName'];
		
		$mQRcode = new QRcodeModel();
		$data['dataQRCode'] = $mQRcode->getDataMergeDB();
		
        $this->assets['html'] = ['frontend/scan/index'];
		$data = $this->dataUnion($data);
		return view('frontend/index', $data);
	}
}