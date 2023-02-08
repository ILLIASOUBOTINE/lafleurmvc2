<?php
  
	$configFile = file_get_contents("config/config.json");
	$config = json_decode($configFile);
	// var_dump($config->autoloadFolder);
	// var_dump($config->datasource);
	spl_autoload_register(function($class) use($config)
	{
		foreach($config->autoloadFolder as $folder)
		{
			if(file_exists($folder . '/' . $class . '.php'))
			{
				require_once($folder . '/' . $class . '.php');
			}
		}
	});
	
  	session_start();
	// unset($_SESSION['offreProduits']);
	require 'functions.php';
    require 'config/init.php';

	
	try
	{
		$httpRequest = new HttpRequest();
		$router = new Router();
		$route = $router->findRoute($httpRequest);
		$httpRequest->setRoute($route);
		
		// if (null !== $httpRequest->getRoute()) {
			// echo 'exist route';
			$path = $route->getController().'Controller';
			
			$controller = new $path($httpRequest);
			$action = $route->getAction();
			if (method_exists($controller,$action)) {
				$controller->$action();
			}
			
		// }
        
       
	}
	catch(Exception $e)
	{
		echo "Une erreur s'est produite";
	}
	