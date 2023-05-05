<?php
	class DetailsController extends BaseController{
		public function __construct($httpRequest){
			parent::__construct($httpRequest);
            $this->addParam('title','Details');
		}
        
		public function show(){
            $produitM = new ProduitManager();
            $produit = $produitM->getById($this->get_httpRequest()->getParam()['id']);
            if(!$produit) {
                include '404.html';
            } 
            $this->addParam('produit',$produit);
            $populaireProduits = $_SESSION['populaireProduits'];
            $this->addParam('titreSectionPopulaire', 'Le plus populaire');
            $this->addParam('populaireProduits', $populaireProduits);
            return $this->view('show');
        }
    }