<?php
	class CommandeController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
            $this->addParam('title','Commande');
		}
        
		public function show(){
           
			// var_dump( json_decode($_POST["dataPanier"], true));
			   
			
           
            $filename = 'show' ;
            return $this->view($filename);
        }
        
      
		
        
	
		
	
	}