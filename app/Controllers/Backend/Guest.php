<?php namespace App\Controllers\Backend;

use App\Controllers\MyController;
use App\Models\Guests as GuestModel;
use App\Models\Movies as MovieModel;

class Guest extends MyController
{	
	public function __construct()
	{
		parent::__construct();
		$this->assets = array(
			'css' => [
				'assets/backend/styles/guest.css'
			],
			'js' => [
				'assets/backend/scripts/guest.js',
			],
			'html' => [],
		);
		$this->ajaxUrl = [
			'create' => base_url('api/guest/create'),
		];
	}
	
	public function index($_page = NULL)
	{
		$data = array();
		$default = $this->default;
		
		$data['metaTitle'] = 'Danh sách khách mời - '. $default['siteName'];	

		$mGuest = new GuestModel();
		$perPage = 50;
		$isPage = isset($_page) ? $_page : 1;
		$totalPage = $mGuest->countAllResults();	
		
		$data['rowId'] = ($perPage * $isPage) - $perPage;
		$data['dataGuests'] = $mGuest->getDataMergeDB()->paginate($perPage, 'guest', $isPage, $totalPage);
		$data['pagination'] = $mGuest->pager->makeLinks($isPage, $perPage, $totalPage, 'pagination', 2);

		/* View */
		$this->assets['html'] = ['backend/guest/index'];
		$data = $this->dataUnion($data);
		return view('backend/index', $data);
	}
	
	public function create()
	{
		$data = array();
		$default = $this->default;
		
		$data['metaTitle'] = 'Thêm khách mời - '. $default['siteName'];
		
		$mMovie = new MovieModel();
		$data['movies'] = $mMovie->getData();
		
		/* View */
		$this->assets['html'] = ['backend/guest/create'];
		$data = $this->dataUnion($data);
		return view('backend/index', $data);
	}
	
	
}