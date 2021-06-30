<?php 
namespace App\Controllers\API;

use App\Controllers\ApiController;
use App\Models\QRcodes as QRcodeModel;

class QRcode extends ApiController
{		
	public function __construct()
	{
		
	}
	
	public function active()
	{
		$alert = null;
		$request = $this->request;
		
		$setRules = [
			'token' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Không tìm thấy mã',
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
		
		$token = $request->getVar('token');
		
		$mQRcode = new QRcodeModel();
		$isActive = $mQRcode->isActiveToken($token);
		$movieId = $isActive['movie_id'];

		$data = array(
			'actived_at' => date('Y-m-d H:i:s')
		);
		$mQRcode->toUpdate('token', $token, $data);
		
		$alert = $this->createRespond('Sử dụng mã thành công', 0);
		$alert['data']['amount'] = $mQRcode->hasAmount($movieId);
		$alert['data']['total'] = $mQRcode->hasTotal($movieId);
		return $this->respond($alert);
	}
	
	public function isActive()
	{
		$alert = null;
		$request = $this->request;

		$setRules = [
			'token' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Không tìm thấy mã',
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

		$token = $request->getVar('token');
				
		if(strlen($token) !== 8 || strpos($token, 'KMD') === false)
		{
			$alert = $this->createRespond('Mã không đúng định dạng', 1);
			return $this->respond($alert);
		}
		
		$mQRcode = new QRcodeModel();
		
		$hasToken = $mQRcode->hasToken($token);
		if($hasToken !== 1){
			$alert = $this->createRespond('Không có trong hệ thống', 1);
			return $this->respond($alert);
		}
		
		$isActive = $mQRcode->isActiveToken($token);
		$activedAt = $isActive['actived_at'];
		$movieId = $isActive['movie_id'];
		
		if($activedAt !== '0000-00-00 00:00:00'){
			$alert = $this->createRespond('Mã đã sử dụng '. $activedAt, 1);
			$alert['data']['amount'] = $mQRcode->hasAmount($movieId);
			$alert['data']['total'] = $mQRcode->hasTotal($movieId);
			return $this->respond($alert);
		}
		
		$alert = $this->createRespond('Chưa đổi vé', 0);
		$alert['data']['amount'] = $mQRcode->hasAmount($movieId);
		$alert['data']['total'] = $mQRcode->hasTotal($movieId);
		return $this->respond($alert);
	}
}