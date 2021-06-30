<?php namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table = 'users'; 
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['account', 'name', 'password', 'phone', 'email', 'role', 'permissions', 'created_at', 'updated_at'];
    protected $useTimestamps = false;

    protected $validationRules = [];
	
    protected $validationMessages = [];
    protected $skipValidation = false;
	
    public function getData()
    {
		return $this->select('id, name, avatar, email, created_at')
					->orderBy('id', 'DESC');
    }
}