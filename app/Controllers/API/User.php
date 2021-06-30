<?php 
namespace App\Controllers\API;

use CodeIgniter\Pager\PagerRenderer;
use App\Controllers\ApiController;
use App\Models\Users as UserModel;

class User extends ApiController
{	
	private $_lang = array(); 
	
	public function __construct()
	{
		$this->_lang = [
			'name' => lang('User.name', [], 'vi'),
			'email' => lang('User.email', [], 'vi'),
			'account' => lang('User.account', [], 'vi'),
			'password' => lang('User.password', [], 'vi'),
		];
	}
	
	public function index($_page = NULL)
	{
		return;
	}

	public function create()
	{
		$alert = null;
		$request = $this->request;
		
		$setRules = [
			'name' => [
				'rules'  => 'required|min_length[5]',
				'errors' => [
					'required' => lang('User.required', [$this->_lang['name']], 'vi'),
					'min_length' => lang('User.minLength', [$this->_lang['name'], 5], 'vi'),
				]
			],
			'account' => [
				'rules'  => 'required|min_length[5]',
				'errors' => [
					'required' => lang('User.required', [$this->_lang['account']], 'vi'),
					'min_length' => lang('User.minLength', [$this->_lang['account'], 5], 'vi'),
				]
			],
			'email' => [
				'rules'  => 'required|min_length[6]',
				'errors' => [
					'required' => lang('User.required', [$this->_lang['email']], 'vi'),
					'min_length' => lang('User.minLength', [$this->_lang['email'], 6], 'vi'),
				]
			],
			'password' => [
				'rules'  => 'required|min_length[6]',
				'errors' => [
					'required' => lang('User.required', [$this->_lang['password']], 'vi'),
					'min_length' => lang('User.minLength', [$this->_lang['password'], 6], 'vi'),
				]
			]
		];
		
		if (!$this->validate($setRules)) {
			$errors = $this->validator->getErrors();
			foreach ($errors as $key => $value) {
				$alert = $this->createRespond($value, 1);
				break;
			}
			return $this->respond($alert);
		}
	}

	public function edit($_id = NULL)
	{
		
	}

	public function delete($_id = NULL)
	{
		
	}
}