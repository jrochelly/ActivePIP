<?php 

$config['base_url'] = ''; // Base URL including trailing slash (e.g. http://localhost/)

$config['default_controller'] = 'welcome'; // Default controller to load
$config['error_controller'] = 'error'; // Controller used for errors (e.g. 404, 500 etc)


define('HEADER', APP_DIR . 'views/layout/header.php'); // header default path
define('FOOTER', APP_DIR . 'views/layout/footer.php'); // footer default path

define('DB_ENGINE', 'mysql');  
define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_USER', 'root');
define('DB_PW', 'password');
define('DB_DBNAME', 'dbname');

# inclue the ActiveRecord lib
require_once '/php-activerecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg)
{
  $cfg->set_model_directory(APP_DIR.'models');
  $cfg->set_connections(array('development' =>
    'mysql://root:password@localhost/dbname'));
});

?>