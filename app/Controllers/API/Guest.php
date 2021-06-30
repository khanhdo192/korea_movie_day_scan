<?php 
namespace App\Controllers\API;

use App\Controllers\ApiController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use App\Models\Guests as GuestModel;
use App\Models\QRcodes as QRcodeModel;

class Guest extends ApiController
{	
	private $mimes = array();
	
	private $arrayToken = array();
	
	public function __construct()
	{
		$this->mimes = array(
			'xls' => 'application/vnd.ms-excel',
			'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
		);
	}
	
	public function create()
	{
		$alert = null;
		$request = $this->request;
		$userId = $this->userId;

		$setRules = [
			'movie_id' => [
				'rules'  => 'required',
				'errors' => [
					'required' => 'Không tìm thấy id phim',
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

		$movieId = $request->getPost('movie_id');
		$file = $request->getFile('file');
		
		$type = $file->getClientMimeType();
		
		if(!in_array($type, array_values($this->mimes)))
		{
			$alert = $this->createRespond('File gửi lên không đúng dạng excel', 1);
			return $this->respond($alert);
		}
		
		$key = array_search($type, array_values($this->mimes));
		$ext = array_keys($this->mimes)[$key];
		
		/* Xử lý up ảnh sửa tên file */
		$newName = sprintf('g_%s.%s', time(), $ext) ;
		$file->move('uploads/files', $newName);

		/* Đọc file excel */
		$mGuest = new GuestModel();
		$mQRcode = new QRcodeModel();
		$dataExcel = $this->readExcel($newName);
		
		foreach ($dataExcel as $row)
		{
			$name = $row[0];
			$email = mb_strtolower($row[1]);
			$phone = $row[2];
			
			if(empty($email)){
				continue;
			}
			
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$log = sprintf('[ERROR - IMPORT EMAIL] Not valid email: %s | name: %s | phone: %s', $email, $name, $phone);
				log_message('error', $log);
				continue;
			}
			
			$name = mb_convert_case($name, MB_CASE_TITLE, 'UTF-8');			
			$dataGuest = array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
			);
			
			/* Save db 1 */
			$mGuest->insert($dataGuest);
			
			/* Save db 2 */
			$token = $this->getNewCode($this->arrayToken);
            $this->arrayToken[] = $token;
			
			$guestId = $mGuest->insertID();
			$reToken = sprintf('KMD%s%s', $movieId, $token);
			$dataQRcode = array(
				'movie_id' => $movieId,
				'guest_id' => $guestId,
				'token' => $reToken
			);
			
			$mQRcode->insert($dataQRcode);
		};


		$alert = $this->createRespond('Thêm khách mời thành công', 0);
		$alert['data']['reurl'] = base_url('guest');
		return $this->respond($alert);
	}
	
	private function readExcel($_name)
	{
		$reader = new Xlsx();
		$patch = sprintf(FCPATH . 'uploads/files/%s', $_name);
		$spreadsheet = $reader->load($patch);
		$sheetData = $spreadsheet->getSheet(0)->toArray();

		unset($sheetData[0]);
		
		return $sheetData;
	}

    private function getNewCode()
	{
        $num = rand(1001, 9999);
        while (in_array($num, $this->arrayToken)) {
            $num = rand(1001, 9999);
        }
        return $num;
    }

}