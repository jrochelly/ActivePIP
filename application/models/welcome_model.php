<?php
// The table's name must be the class's name in plural 
class welcome_model extends ActiveRecord\Model {
	// To use ActiveRedcord, the class must extends itself.
	public function findAll()
	{
		return welcome_model::find('all');
	}

}

?>