<?php
    class FiltreController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
        }
        
		public function filtreBy(){
            
            $offreProduits = $_SESSION['offreProduits'];
            $populaireProduits = $_SESSION['populaireProduits'];
            
            $this->addParam('titreSectionNosOffre', 'Nos offres');
            $this->addParam('offreProduits', $offreProduits);
          
            $this->addParam('titreSectionPopulaire', 'Le plus populaire');
            $this->addParam('populaireProduits', $populaireProduits);
        
            $filename = 'main' ;
            return $this->view($filename);
        }
        
    }