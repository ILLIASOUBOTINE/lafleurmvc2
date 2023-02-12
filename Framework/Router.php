<?php

    // include 'MultipleRouteFoundException.php';
    // include 'NoRouteFoundException.php';


	class Router
	{
		private $listRoute;
		
		public function __construct()
		{
			$stringRoute = file_get_contents('config/route.json');
			$this->listRoute = json_decode($stringRoute);
            // var_dump($this->listRoute);
		}
		
		public function findRoute($httpRequest)
		{
			$routeFound = array_filter($this->listRoute,function($route) use ($httpRequest){
				return preg_match("#^" . $route->path . "$#", $httpRequest->getRedirectUrl()) && $route->method == $httpRequest->getMethod()  
				&& empty(array_diff_assoc($httpRequest->getKeyParam(),$route->param)) && count($httpRequest->getKeyParam()) == count($route->param); 
			});
			// var_dump($httpRequest);
			// echo '<br/>';
			var_dump($_POST);
			// var_dump($routeFound);
			// echo '<br/>';
			// var_dump(array_shift($routeFound));
			$numberRoute = count($routeFound);
			
			if($numberRoute > 1)
			{
				throw new MultipleRouteFoundException();
                // return "Error";
			}
			else if($numberRoute == 0)
			{
				// echo "Error";
				throw new NoRouteFoundException();
                
			}
			else
			{
				return new Route(array_shift($routeFound));	
				// return new Route($routeFound);	
			}
		}
	}