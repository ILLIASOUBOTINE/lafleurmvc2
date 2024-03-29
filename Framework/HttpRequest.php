<?php

	class HttpRequest{
		private $_url;
		private $_redirectUrl;
		private $_method;
		private $_param;
		private $_route;
		
		public function __construct(){
			$this->_url = $_SERVER['REQUEST_URI'];
			$this->setRedirectUrl();
			$this->_method = $_SERVER['REQUEST_METHOD'];
			$this->_param = array();
			$this->bindParam();
		}
		
		public function getUrl()
		{
			return $this->_url;	
		}
		
		public function getRedirectUrl()
		{
			return $this->_redirectUrl;	
		}
		
		private function setRedirectUrl()
		{
			if (isset($_SERVER["REDIRECT_URL"])) {
				$this->_redirectUrl = $_SERVER["REDIRECT_URL"];
			}else {
				$this->_redirectUrl = '/';
			}
			
		}

		
		public function getMethod()
		{
			return $this->_method;	
		}
		
		public function getParam()
		{
			return $this->_param;	
		}
		
		public function setRoute($route)
		{
			$this->_route = $route;	
		}
		public function getRoute()
		{
			return $this->_route;	
		}
		
		public function getKeyParam()
		{
			$arrKeyParam = [];
			foreach($this->_param as $key => $value){
				$arrKeyParam[] = $key;
			}
			return $arrKeyParam;	
		}
		
		
		public function bindParam(){
			switch($this->_method){
				case "GET":
					foreach( $_GET as $key => $param){
						$this->_param[$key] = $param;
					}
					break;
				case "POST":
					if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
						die('Invalid CSRF token');
					}else {
						foreach($_POST as $key => $param){
							if ($key !== 'csrf_token') {
								if (!preg_match('/[<>]/', $param)) {
									$this->_param[$key] = $param;
								}else{
									$this->_param[$key] = "";
								}
							}
						}
						// var_dump($this->_param);
						// exit;
					}
					break;	
			}
		}
	}