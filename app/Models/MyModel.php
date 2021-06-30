<?php namespace App\Models;

use CodeIgniter\Model;

class MyModel extends Model
{
	
	public function getCount(string $where, $id)
    {
		return $this->select('COUNT(id)')
				->where($where, $id)
				->countAllResults();
    }
	
	public function toUpdate(string $where, $id, array $data)
    {
		return $this->where($where, $id)
					->set($data)
					->update();
    }

	public function toInsertBatch($data)
	{
		$result = array();
		foreach ($data as $value) 
		{
			$this->insert($value);
			$result[] = $this->insertID();
		}
		return $result;
	}
}