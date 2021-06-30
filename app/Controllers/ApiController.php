<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class ApiController extends ResourceController
{
	use ResponseTrait;
	
	protected $user = null;
	
	protected $userId = 0;

	protected function __construct()
    {
		$user = session()->get('userData');
		if(!empty($user)){
			$this->user = $user;
			$this->userId = $user['id'];
		}
	}
	
	protected function createRespond(string $_text = '', int $_error = 1)
	{
		$response = array();
		$response['status'] = 200;
		$response['error'] = $_error;
		$response['data']['rehash'] = csrf_hash();
		$response['messages'] = $_text;

		return $response;
	}
}