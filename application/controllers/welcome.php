<?php

class welcome extends Controller {
	
	function index()
	{
		$template = $this->loadView('welcome/index');
		// Values only accepted between this two lines of code.
		// Exemple of setting a value:
		// $template->set('var', $value);
		$template->render();
	}
    
}

?>