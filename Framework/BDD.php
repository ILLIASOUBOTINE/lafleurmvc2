<?php
 	class BDD{
		private $_bdd;
		protected $_datasource;
		private static $_instance;
        
		private function __construct(){
			$this->_datasource = $this->setDatasource();
            $this->_bdd = new PDO('mysql:host='.
			$this->_datasource->host.';dbname='. 
			$this->_datasource->dbname.';charset=utf8', 
			$this->_datasource->user, 
			$this->_datasource->password);
		}

        public static function getInstance(){
			if(empty(self::$_instance)){
				self::$_instance = new BDD();
			}
			return self::$_instance->_bdd;
		}

		public function setDatasource(){
			$configFile = file_get_contents("config/config.json");
 			$config = json_decode($configFile);
			$datasource = $config->datasource;
			return $datasource;
		}
	}