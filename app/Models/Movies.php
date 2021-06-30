<?php namespace App\Models;

use CodeIgniter\Model;

class Movies extends MyModel
{
    protected $table = 'movies'; 
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['name_vi', 'name_en', 'location', 'address', 'started_at', 'created_at', 'updated_at'];
    protected $useTimestamps = false;

    protected $validationRules = [];
	
    protected $validationMessages = [];
    protected $skipValidation = false;
	
    public function getData()
    {
		return $this->select('id, name_vi, name_en, location, started_at')
					->orderBy('started_at', 'ASC')
					->get()
					->getResultArray();
    }
}