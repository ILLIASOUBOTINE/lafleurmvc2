<?php
	class CadeauController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
            $this->addParam('title','Commande');
		}
        
		public function show(){
			
			$filename = 'show' ;
            return $this->view($filename);
		}

		
	
	}