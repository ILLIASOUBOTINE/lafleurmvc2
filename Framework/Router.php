<?php

    class Router
	{
		private $listRoute;
		
		public function __construct()
		{
			$stringRoute = file_get_contents('config/route.json');
			$this->listRoute = json_decode($stringRoute);
            
		}
		
		public function findRoute($httpRequest)
		{
			$routeFound = array_filter($this->listRoute,function($route) use ($httpRequest){
				return preg_match("#^" . $route->path . "$#", $httpRequest->getRedirectUrl()) && $route->method == $httpRequest->getMethod()  
				&& empty(array_diff_assoc($httpRequest->getKeyParam(),$route->param)) && count($httpRequest->getKeyParam()) == count($route->param); 
			});
			
			$numberRoute = count($routeFound);
			
			if($numberRoute > 1)
			{
				throw new MultipleRouteFoundException();
                
			}
			else if($numberRoute == 0)
			{
				
				throw new NoRouteFoundException();
                
			}
			else
			{
				return new Route(array_shift($routeFound));	
				
			}
		}
	}