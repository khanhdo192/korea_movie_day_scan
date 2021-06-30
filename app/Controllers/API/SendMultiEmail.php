<?php 
namespace App\Controllers\API;

use App\Controllers\ApiController;
use App\Models\Guests as GuestModel;
use App\Models\QRcodes as QRcodeModel;

use App\Libraries\EmailTemps as LibEmailTemp;

class SendMultiEmail extends ApiController
{	
	// http://kmd2021.localhost/api/send-email?action=start&temp=4
	
	public function __construct()
	{
		parent::__construct();
	}

	public function send()
	{
		$alert = null;
		$request = $this->request;
		
		$setRules = [
			'action' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Không tìm thấy hành động',
				]
			],
			'temp' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Không tìm template',
				]
			],
		];
		
		if (!$this->validate($setRules)) {
			$errors = $this->validator->getErrors();
			foreach ($errors as $key => $value) {
				$alert = $this->createRespond($value, 1);
				break;
			}
			return $this->respond($alert);
		}
		
		$action = $request->getVar('action');
		$temp = $request->getVar('temp');
		
		if($action !== 'start' || ($temp !== '1' && $temp !== '2' && $temp !== '3' && $temp !== '4'  && $temp !== '5' && $temp !== '6' && $temp !== '7' && $temp !== '8'))
		{
			$alert = $this->createRespond('Fail', 1);
			return $this->respond($alert);
		}
		
		$libEmailTemp = LibEmailTemp::getInstance();
		$mGuest = new GuestModel();
		$mQRcode = new QRcodeModel();
		
		//$allEmails = $mGuest->getAllEmail();
		$filter = 0;
		if($temp === '1'){
			$filter = 1;
		}else if($temp === '2'){
			$filter = 2;
		}else if($temp === '3'){
			$filter = 3;
		}else if($temp === '4'){
			$filter = 4;
		}else if($temp === '5'){
			$filter = 1;
		}else if($temp === '6'){
			$filter = 2;
		}else if($temp === '7'){
			$filter = 3;
		}else if($temp === '8'){
			$filter = 4;
		};
		$allEmails = $mGuest->getEmailFilter($filter);
		if(count($allEmails) < 1){
			$alert = $this->createRespond('Không tìm thấy data email', 1);
			return $this->respond($alert);
		}

		$sEmail = \Config\Services::email();
		foreach($allEmails as $key => $value)
		{
			$id = $value['id'];
			$email = $value['email'];
			$token = $value['token'];
			
			//check valid mail
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$log = sprintf('[ERROR - SEND EMAIL] Stop send, not valid email: %s | id: %s', $email, $id);
				log_message('error', $log);
				continue;
			}
			
			if($temp === '1'){
				$subject = '[KTO Việt Nam] Vé mời tham dự 2021 KOREA MOVIE DAY – 14:00 THỨ 7, NGÀY 17/04/2021';
				$libEmailTemp->setQRCode($token);
				$message = $libEmailTemp->handleTemp(1);
			}else if ($temp === '2'){
				$subject = '[KTO Việt Nam] Vé mời tham dự 2021 KOREA MOVIE DAY – 14:00 Chủ Nhật ngày 18/04/2021';
				$libEmailTemp->setQRCode($token);
				$message = $libEmailTemp->handleTemp(2);
			}else if ($temp === '3'){
				$subject = '[KTO Việt Nam] Vé mời tham dự 2021 KOREA MOVIE DAY – 14:00 Chủ Nhật, ngày 25/04/2021';
				$libEmailTemp->setQRCode($token);
				$message = $libEmailTemp->handleTemp(3);
			}else if ($temp === '4'){
				$subject = '[KTO Việt Nam] Vé mời tham dự 2021 KOREA MOVIE DAY – 16:00 Chủ nhật, ngày 25/04/2021';
				$libEmailTemp->setQRCode($token);
				$message = $libEmailTemp->handleTemp(4);
			}else if ($temp === '5'){
				$subject = '[KTO Việt Nam] Thông báo thời gian đổi vé 2021 KOREA MOVIE DAY';
				$message = $libEmailTemp->handleTemp(5);
			}else if ($temp === '6'){
				$subject = '[KTO Việt Nam] Thông báo thời gian đổi vé 2021 KOREA MOVIE DAY';
				$message = $libEmailTemp->handleTemp(6);
			}else if ($temp === '7'){
				$subject = '[KTO Việt Nam] Thông báo thời gian đổi vé 2021 KOREA MOVIE DAY';
				$message = $libEmailTemp->handleTemp(7);
			}else if ($temp === '8'){
				$subject = '[KTO Việt Nam] Thông báo thời gian đổi vé 2021 KOREA MOVIE DAY';
				$message = $libEmailTemp->handleTemp(7);
			};
		
			$sEmail->clear();
			$sEmail->setTo($email);
			$sEmail->setFrom('no-reply@kmd2021.breadntea.vn', 'KTO Việt Nam');
			$sEmail->setSubject($subject);
			$sEmail->setMessage($message);
			if ($sEmail->send()) {
				
				$data = array(
					'send_at' => date('Y-m-d H:i:s')
				);
				$mQRcode->toUpdate('token', $token, $data);
				
				$log = sprintf('[SUCCESS - SEND EMAIL] Email send to: %s | id: %s', $email, $id);
				log_message('error', $log);
			} else {
				$log = sprintf('[ERROR - SEND EMAIL] Email send to: %s | id: %s', $email, $id);
				log_message('error', $log);
			}
		}
		
		$alert = $this->createRespond('Complete', 0);
		return $this->respond($alert);
	}

	public function show($id = null)
	{
		$alert = null;
		$request = $this->request;
		
		$setRules = [
			'temp' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Không tìm thấy hành động',
				]
			],
			'code' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Không tìm thấy hành động',
				]
			],
		];
		
		if (!$this->validate($setRules)) {
			$errors = $this->validator->getErrors();
			foreach ($errors as $key => $value) {
				$alert = $this->createRespond($value, 1);
				break;
			}
			return $this->respond($alert);
		}
		
		$temp = $request->getVar('temp');
		$code = $request->getVar('code');
		
		$libEmailTemp = LibEmailTemp::getInstance();
		$libEmailTemp->setQRCode($code);
		$message = $libEmailTemp->handleTemp($temp);
		return $message;
	}
	
	public function fixed($id = null)
	{
		$alert = null;
		$request = $this->request;
		
		$setRules = [
			'temp' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Không tìm thấy hành động',
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
		
		$temp = $request->getVar('temp');

		$mGuest = new GuestModel();
		$allEmails = $mGuest->getEmailFilter($temp);
		print_r($allEmails);
		
		/*$mQRcode = new QRcodeModel();
		$updateData = array();
		for ($id = 1; $id <= 341; $id++) {
			//if($id === 211 || $id === 240 || $id === 278 || $id === 287){
			//	continue;
			//}
			$updateData[] = array(
				'guest_id' => $id,
				'actived_at' => '0000-00-00 00:00:00',
			);
		};
		
		$mQRcode->updateBatch($updateData, 'guest_id');

		print_r('ok');*/
		
		return;
	}
}