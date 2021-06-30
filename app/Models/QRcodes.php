<?php namespace App\Models;

use CodeIgniter\Model;

class QRcodes extends MyModel
{
    protected $table = 'qrcodes'; 
    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = ['movie_id', 'guest_id', 'token', 'send_at', 'actived_at', 'created_at'];
    protected $useTimestamps = false;

    protected $validationRules = [];
	
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function hasToken($_token)
    {
		return $this->select('COUNT(id)')
				->where('token', $_token)
				->countAllResults();
    }

    public function hasTotal($_movieId)
    {
		return $this->select('COUNT(id)')
				->where('movie_id', $_movieId)
				->countAllResults();
    }

    public function hasAmount($_movieId)
    {
		return $this->select('COUNT(id)')
				->where('actived_at !=', '0000-00-00 00:00:00')
				->where('movie_id', $_movieId)
				->countAllResults();
    }
	
    public function isActiveToken($_token)
    {
		return $this->select('actived_at, movie_id')
				->where('token', $_token)
				->first();
				//->limit(1)
				//->get()
				//->getResultArray();
    }
	
    public function getDataMergeDB()
    {
		return $this->select('qrcodes.token, guests.name, guests.email, guests.phone, movies.name_vi, movies.name_en, movies.location, movies.started_at')
				->join('guests','guests.id = qrcodes.guest_id', 'right')
				->join('movies','movies.id = qrcodes.movie_id', 'right')
				->where('guests.email is NOT NULL')
				->orderBy('qrcodes.guest_id', 'ASC')
				->get()
				->getResultArray();
    }
}