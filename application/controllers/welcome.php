<?php

class welcome extends Controller {
	
	function index()
	{
		$template = $this->loadView('welcome/index');
		// Valores só podem ser setados abaixo desta linha.
		$template->render();
	}
    
}

?>