<?php
class core
{
    function __construct()
    {
    	global $config;
        
        // Set our defaults
        $controller = $config['default_controller'];
        $action = 'index'; // In case no action is passed through url
        $url = '';
    	
    	// Get request url and script url
    	$request_url = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';
    	$script_url  = (isset($_SERVER['PHP_SELF'])) ? $_SERVER['PHP_SELF'] : '';
        	
    	// Get our url path and trim the / of the left and the right
    	if($request_url != $script_url) $url = trim(preg_replace('/'. str_replace('/', '\/', str_replace('index.php', '', $script_url)) .'/', '', $request_url, 1), '/');
        
    	// Split the url into segments
    	$segments = explode('/', $url);

        /*
        --------------------------------
             HOW SEGMENTS IS CATCH
        --------------------------------
        
        localhost/project_folder/  controller  /  action  /  param
                                  segments[0] / segments[1]
        ----------------------------------------------------------------------------
        localhost/project_folder/  folder  /  controller  /  action  /  param
                                segments[0] / segments[1] / segments[2]

        ---------------------------
   	    GET OUR CONTROLLER FILE
        Getting possible paths to find the file */
        if (isset($segments[1])) { $path = APP_DIR . 'controllers/' . $segments[0] .'/'. $segments[1] . '.php'; }
        if (isset($segments[0])) { $path2 = APP_DIR . 'controllers/' . $segments[0] . '.php'; }
        $path3 = APP_DIR . 'controllers/' . $config['default_controller'] . '.php';

        /*
            LET'S FIND WHERE THE FILE IS.
        */
        // The controller is inside a folder like /application/controllers/folder/file.php
    	if(isset($path) and file_exists($path)){
            require_once($path);
            if (isset($segments[1])) $controller = $segments[1];
            if (isset($segments[2])) {
            	$action = $segments[2];
            } else {
            	$action = 'index';
            }

            $this->check_path($controller, $action);
            $this->call_method($controller, $action, $segments, 3);
    	}

        // The controller is inside the main controller folder like /application/controllers/file.php
    	if (file_exists($path2)){
            require_once($path2);
            $controller = $segments[0];
            if (isset($segments[1])) {
            	$action = $segments[1];
            } else {
            	$action = 'index';
            }
    	}
        // Aims to get main controller if the above code is not triggered
    	if (file_exists($path3)){
            require_once($path3);
    	} else {
            $controller = $config['error_controller'];
            require_once(APP_DIR . 'controllers/' . $controller . '.php');
    	}

        $this->check_path($controller, $action);
    	$this->call_method($controller, $action, $segments, 2);
    }

    // CHECK THE ACTION EXISTS
    function check_path($controller, $action)
    {
        if(!method_exists($controller, $action)){
            $controller = $config['error_controller'];
            require_once(APP_DIR . 'controllers/' . $controller . '.php');
            $action = 'index';
        }
    }

    // CREATE OBJECT AND CALL METHOD
    function call_method($controller, $action, $segments, $slice)
    {
        $obj = new $controller;
        die(call_user_func_array(array($obj, $action), array_slice($segments, $slice)));
    }
}

?>