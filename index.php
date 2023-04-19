<?php
	$configFile = file_get_contents("config/config.json");
	$config = json_decode($configFile);
	
	// var_dump($config);
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
	// unset($_SESSION['client']);
	// unset($_SESSION['populaireProduits']);
	// unset($_SESSION['offreProduits']);
	// unset($_SESSION['villes']);
	// unset($_SESSION['votreChoixProduits']);
	//  unset($_SESSION['livraison']);
	//  unset($_SESSION['essaiCadeau']);
	// require 'functions.php';
    require 'config/init.php';
	
	
	try
	{
		$httpRequest = new HttpRequest();
		$router = new Router();
		// var_dump($httpRequest);
		// var_dump($_POST);
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
    //     var_dump($_SESSION['essaiCadeau']);
    //    exit();
	}
	catch(Exception $e)
	{
		
		include '404.html';
		// echo "Une erreur s'est produite";
	}
	