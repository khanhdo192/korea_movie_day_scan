<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class MyController extends Controller
{
	public $default = null;
		
	public $user = null;
	
	public $userId = 0;
	
	protected $location = null;
	
	protected $siteName = 'Korea Move 2021 - Dashboard';
	
	protected $siteFullName = 'Korea Move 2021 - Dashboard';

	protected $assets = null;
	
	protected $ajaxUrl = array();
	
	public function __construct()
    {
		$this->start();
		$this->setLocation();
		
		$user = session()->get('userData');
		if(!empty($user)){
			$this->user = $user;
			$this->userId = $user['id'];
		}
	}
	
	public function start() 
	{
		$data = [
			'siteName' => $this->siteName,
			'siteFullName' => $this->siteFullName,
			'siteLogo' => '',
			'siteSlogan' => '',
			'siteFavicon' => '',
			
			'metaTitle' => $this->siteName,
			'metaDescription' => $this->siteFullName,
			'metaImage' => '',
		];
		
		$this->default = $data;
		return $data;
	}
	
	protected function dataUnion($_param)
	{
		if(!is_array($_param)){
			return array();		
		}else{
			$reParam = $this->dataProcess($_param);
			$data = array_replace_recursive($this->default, $reParam);
			return $data;
		}
	}
	
	private function dataProcess($_data)
	{		
		if(!empty($this->user)){
			$_data['ajaxUrl'] = $this->defaultUrl();
			$_data['user'] = $this->user;
		}else{
			$_data['ajaxUrl'] = $this->ajaxUrl;
			$_data['user'] = array();
		}
		
		$_data['assets'] = $this->assets;
		return $_data;
	}
	
	private function defaultUrl()
	{
		$url = array();
		if($this->location === 'backend'){
			$url['logout'] = base_url('api/auth/logout');
		};
		
		return array_replace_recursive($this->ajaxUrl, $url);
	}
	
	private function setLocation()
	{
		$getClass = get_class($this);
		$list = array(
			'Frontend',
			'Backend'
		);
		foreach ($list as $value) {
			$findType = strpos($getClass, $value);
			if ($findType !== false) {
				$this->location = strtolower($value);
				break;
			}
		}
	}
}