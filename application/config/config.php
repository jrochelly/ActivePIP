<?php 

$config['base_url'] = ''; // Base URL including trailing slash (e.g. http://localhost/)

$config['default_controller'] = 'welcome'; // Default controller to load
$config['error_controller'] = 'error'; // Controller used for errors (e.g. 404, 500 etc)


define('HEADER', APP_DIR . 'views/layout/header.php'); // Caminho padrão do header
define('FOOTER', APP_DIR . 'views/layout/footer.php'); // Caminho padrão do footer

define('DB_ENGINE', 'mysql');  
define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_USER', 'root');
define('DB_PW', '');
define('DB_DBNAME', 'intranet');

?>