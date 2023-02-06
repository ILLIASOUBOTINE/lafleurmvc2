<?php
	class ContactController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
            $this->addParam('title','Contact');
		}
        
		public function show(){
            
           
            $filename = 'show' ;
            return $this->view($filename);
        }
        
      
		
        
	
		
	
	}