<?php
/**
 * @Author	HaiNM - VTT - BreadnTea
 * @Mail	nguyenminhhai@breadntea.vn
 */
namespace App\Helpers;

use App\Helpers\Helper;

class Link extends Helper
{
	public $URL = array();

    protected function __construct()
    {
		$this->URL = [
			'upload' => 'uploads/',
			'noAvatar' => 'assets/backend/images/no-avatar.png',
			'noImage' => 'assets/backend/images/no-image.png',
		];
	}
	
	public function doAvatar(?string $_url = null)
	{
		if(!empty($_url)){
			$url = $this->URL['users'] . $_url;
		}else{
			$url = $this->URL['noAvatar'];
		}
		
		$url = base_url($url);
		
		return $url;
	}

}