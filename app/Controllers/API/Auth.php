<?php 
namespace App\Controllers\API;

use App\Controllers\ApiController;
use App\Models\Users as UserModel;
use App\Helpers\Link as LinkHelper;

class Auth extends ApiController
{	
	private $_lang = array(); 
	
	public function __construct()
	{
		$this->_lang = [
			'account' => lang('Auth.account', [], 'vi'),
			'password' => lang('Auth.password', [], 'vi'),
			'methodNotAllowed' => lang('Validation.methodNotAllowed', [], 'vi'),
		];
	}
	
	public function index()
	{
		
	}

	public function login()
	{
		$alert = null;
		$request = $this->request;
		
		$setRules = [
			'account' => [
				'rules'  => 'required|min_length[5]',
				'errors' => [
					'required' => lang('Auth.required', [$this->_lang['account']], 'vi'),
					'min_length' => lang('Auth.minLength', [$this->_lang['account'], 5], 'vi'),
				]
			],
			'password' => [
				'rules'  => 'required|min_length[6]',
				'errors' => [
					'required' => lang('Auth.required', [$this->_lang['password']], 'vi'),
					'min_length' => lang('Auth.minLength', [$this->_lang['password'], 6], 'vi'),
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
		
		$account = $request->getPost('account');
		$password = $request->getPost('password');
		$password = sha1($password);
		$model = new UserModel();
		
		$type = $this->typeAccount($account);
		$getUser = $model->where($type, $account)->first();

		if(empty($getUser)){
			$messages = lang('Auth.notFound', [$this->_lang['account']], 'vi');
			$alert = $this->createRespond($messages, 1);
			return $this->respond($alert);
		}
		if($password != $getUser['password']){
			$messages = lang('Auth.error', [$this->_lang['password']], 'vi');
			$alert = $this->createRespond($messages, 1);
			return $this->respond($alert);
		}

		$res = $this->setUserSession($getUser);
        if($res){
			$messages = lang('Auth.loginSuccess', [], 'vi');
			$alert = $this->createRespond($messages, 0);
			$alert['data']['reurl'] = base_url('/scan');
        }else{
			$messages = lang('Auth.loginFail', [], 'vi');
			$alert = $this->createRespond($messages, 1);
        }
		
		return $this->respond($alert);
	}
	
	public function logout(){
		
		$alert = null;
		
		$checkUser = session()->get('userData');
		if(empty($checkUser)){
			$messages = lang('Auth.noData', [], 'vi');
			$alert = $this->createRespond($messages, 1);
			return $this->respond($alert);
		}
		
		$checkLogin = session()->get('isLoggedIn');
		if(!empty($checkLogin)){
			session()->remove(['isLoggedIn', 'userData']);
			$messages = lang('Auth.logoutSuccess', [], 'vi');
			$alert = $this->createRespond($messages, 0);
			$alert['data']['reurl'] = base_url('/');
		}else{
			$messages = lang('Auth.logoutFail', [], 'vi');
			$alert = $this->createRespond($messages, 1);
		}
		
		return $this->respond($alert);
	}
	
	public function forgot()
	{
		return 'forgot';
	}
	
	private function setUserSession(array $_user = [])
	{
		$link = LinkHelper::getInstance();
		$data = [
			'isLoggedIn' => true,
			'userData' => [
				'id' => $_user['id'],
				'name' => $_user['name'],
				'avatar' => $link->doAvatar($_user['avatar']),
				'role' => $_user['role'],
				'permissions' => $_user['permissions'],
			]
		];

		session()->set($data);
		return true;
	}
	
	private function typeAccount(string $_param = ''){
		if(filter_var($_param, FILTER_VALIDATE_EMAIL)){
			return 'email';
		}else{
			return 'account';
		}
	}
}