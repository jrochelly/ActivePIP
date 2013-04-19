<?php

class error extends Controller {
	
	function index()
	{
		$this->error404();
	}
	
	function error404()
	{
		echo '<h1>Erro 404</h1>';
		echo '<p>A página que você buscava não existe.</p>';
	}
    
}

?>