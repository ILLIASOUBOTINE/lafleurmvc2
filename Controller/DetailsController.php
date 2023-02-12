<?php
	class DetailsController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
            $this->addParam('title','Details');
		}
        
		public function show(){
            
            // $notreLivraison = new NotreLivraisonManager();
            // $villes = $notreLivraison->getAll();
            // $villes = $_SESSION['villes'];
        
            // $this->addParam('villes',$villes);
           
            // var_dump((int)$_GET['id']);
             $produitM = new ProduitManager();
             $produit = $produitM->getById($_GET['id']);
            //  $produits = $produitM->getAll();
            // var_dump($produit);
            
            $this->addParam('produit',$produit);
            // $this->addParam('produits',$produits);
            // // var_dump( $villes);

            // $couleurM = new CouleurManager();
            // $couleur = $couleurM->getAll();
            // $this->addParam('couleur',$couleur);
            
            $populaireProduits = $_SESSION['populaireProduits'];
            $this->addParam('titreSectionPopulaire', 'Le plus populaire');
            $this->addParam('populaireProduits', $populaireProduits);
            
            $filename = 'show';
            return $this->view($filename);
        }
        
      
		
        
	
		
	
	}