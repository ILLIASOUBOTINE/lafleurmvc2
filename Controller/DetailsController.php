<?php
	class DetailsController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
            $this->addParam('title','Details');
		}
        
		public function show(){
            
            $notreLivraison = new NotreLivraisonManager();
            $villes = $notreLivraison->getAll();

           
       
            // $produitM = new ProduitManager();
            // $produit = $produitM->getAll();
            
            $this->addParam('villes',$villes);
            // $this->addParam('produit',$produit);
            // var_dump( $villes);
            $filename = 'show' ;
            return $this->view($filename);
        }
        
      
		
        
	
		
	
	}