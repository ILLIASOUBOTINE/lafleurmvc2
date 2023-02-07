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
            $this->addParam('villes',$villes);
           
            // var_dump((int)$_GET['id']);
             $produitM = new ProduitManager();
             $produit = $produitM->getProduitDetailsById($_GET['id']);
            // var_dump($produit);
            
            $this->addParam('produit',$produit);
            // var_dump( $villes);
            $filename = 'show';
            return $this->view($filename);
        }
        
      
		
        
	
		
	
	}