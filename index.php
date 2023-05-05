<?php
	$configFile = file_get_contents("config/config.json");
	$config = json_decode($configFile);
	
	spl_autoload_register(function($class) use($config){
		foreach($config->autoloadFolder as $folder){
			if(file_exists($folder . '/' . $class . '.php')){
				require_once($folder . '/' . $class . '.php');
			}
		}
	});
	
 	require 'init.php';
	try{
		$httpRequest = new HttpRequest();
		$router = new Router();
		$route = $router->findRoute($httpRequest);
		$httpRequest->setRoute($route);
		$path = $route->getController().'Controller';
		$controller = new $path($httpRequest);
		$action = $route->getAction();
		if (method_exists($controller,$action)) {
			$controller->$action();
		}
	}catch(Exception $e){
		include '404.html';
	}
	