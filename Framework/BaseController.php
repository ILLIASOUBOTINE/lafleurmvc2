<?php
	class BaseController
	{
		private $_httpRequest;
		private $_param;
		
		
		public function __construct($httpRequest)
		{
			$this->_httpRequest = $httpRequest;
			$this->_param = array();
			$this->addParam("httprequest",$this->_httpRequest);
			
			
		}
		
		public function view($filename)
		{
			
			if(file_exists("View/" . $this->_httpRequest->getRoute()->getController() . "/" . $filename . ".php"))
			{
				ob_start();
				extract($this->_param);
				include("View/" . $this->_httpRequest->getRoute()->getController() . "/" . $filename . ".php");
				$content = ob_get_clean();
				include("View/layout.php");
			}
			else
			{
				throw new ViewNotFoundException();	
			}
		}
		
		
		
		public function addParam($name,$value)
		{
			$this->_param[$name] = $value;
		}

		public function redirect($route)
		{
			header('Location: '.$route);
            exit;
		}
	}