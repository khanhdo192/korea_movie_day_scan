<?php namespace App\Controllers\Backend;

use App\Controllers\MyController;
use App\Models\Users as UserModel;
use App\Helpers\Link as LinkHelper;

class User extends MyController
{	
	public function __construct()
	{
		parent::__construct();
		$this->assets = array(
			'css' => [
				'assets/backend/styles/user.css'
			],
			'js' => [
				'assets/backend/scripts/user.js',
			],
			'html' => [],
		);
		$this->ajaxUrl = [
			'userCreate' => base_url('api/user/create'),
			'userEdit' => base_url('api/user/edit'),
			'userDelete' => base_url('api/user/delete'),
		];
	}
	
	public function index($_page = NULL)
	{
		$data = array();
		$default = $this->default;
		
		$data['metaTitle'] = 'Danh sách thành viên - '. $default['siteName'];	

		$model = new UserModel();
		$perPage = 20;
		$isPage = isset($_page) ? $_page : 1;
		$totalPage = $model->countAllResults();	
		
		$data['rowId'] = ($perPage * $isPage) - $perPage;
		$data['dataUsers'] = $model->getData()->paginate($perPage, 'user', $isPage, $totalPage);
		$data['helper'] = LinkHelper::getInstance();
		$data['pagination'] = $model->pager->makeLinks($isPage, $perPage, $totalPage, 'pagination', 2);

		/* View */
		$this->assets['html'] = ['backend/user/index'];
		$data = $this->dataUnion($data);
		return view('backend/index', $data);
	}
	
	public function create()
	{
		$data = array();
		$default = $this->default;
		
		$data['metaTitle'] = 'Tạo thành viên - '. $default['siteName'];	
		
		/* View */
		$this->assets['html'] = ['backend/user/create'];
		$data = $this->dataUnion($data);
		return view('backend/index', $data);
	}
	
	public function edit($_id = NULL)
	{
		$data = array();
		$default = $this->default;
		
		$data['metaTitle'] = 'Sửa thành viên - '. $default['siteName'];	
		
		/* View */
		$data = $this->dataUnion($data);
		return view('backend/index', $data);
	}

	public function search()
	{
		$data = array();
		$default = $this->default;
		
		$data['metaTitle'] = 'Tìm thành viên - '. $default['siteName'];	
		
		/* View */
		$this->assets['html'] = ['backend/user/search'];
		$data = $this->dataUnion($data);
		return view('backend/index', $data);
	}
}