<?php

class welcome_model extends Model {
	
	public function findAll()
	{
		$result = $this->query('SELECT * FROM rh_pessoa;');
		return $result;
	}

}

?>