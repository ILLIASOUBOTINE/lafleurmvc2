<?php
	class AccueilController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
            $this->addParam('title','Accueil');
		}
        
		public function show(){
            
            $notreLivraison = new NotreLivraisonManager();
            $villes = $notreLivraison->getAll();

            $populaire = new ProduitManager();
            $populaireProduits = $populaire->getProduitPopulair(4);
       
          
             var_dump($populaireProduits);
            $this->addParam('populaireProduits', $populaireProduits);
            $this->addParam('villes',$villes);
            // var_dump( $villes);
            $filename = 'main' ;
            return $this->view($filename);
        }
        
        // public function home1(){
        //     $categorie = new CategorieManager();
		// 	$arrCategorie = $categorie->getAll();
        //     $filename = 'main' ;
        //     $this->addParam('arrCategorie',$arrCategorie);
        //     return $this->view($filename);
        // }
		
        
	
		
	
	}