<?php namespace App\Models;

use CodeIgniter\Model;

class Guests extends MyModel
{
    protected $table = 'guests'; 
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['name', 'email', 'phone', 'facebook', 'created_at', 'updated_at'];
    protected $useTimestamps = false;

    protected $validationRules = [];
	
    protected $validationMessages = [];
    protected $skipValidation = false;
	
    public function getDataMergeDB()
    {
		return $this->select('guests.id, guests.name, guests.email, guests.phone, movies.name_vi, movies.name_en, movies.location, movies.started_at, qrcodes.send_at')
				->join('qrcodes','qrcodes.guest_id = guests.id', 'right')
				->join('movies','movies.id = qrcodes.movie_id', 'right')
				->where('guests.email is NOT NULL')
				->orderBy('guests.id', 'DESC');
    }

    public function getEmailFilter($_movieId)
    {
		return $this->select('guests.id, guests.email, qrcodes.token')
				->join('qrcodes','qrcodes.guest_id = guests.id', 'right')
				->where('qrcodes.movie_id', $_movieId)
				->where('qrcodes.send_at', '0000-00-00 00:00:00')
				->limit(100)
				->get()
				->getResultArray();
    }
	
    public function getAllEmail()
    {
		return $this->select('id, email')
					->orderBy('id', 'ASC')
					->get()
					->getResultArray();
    }
}