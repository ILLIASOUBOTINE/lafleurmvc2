<?php

    class AccueilController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
            $this->addParam('title','Accueil');
		}
        
		public function show(){

            $banniere = $_SESSION['banniere'];
            $this->addParam('banniere', $banniere);
            
            
            if (isset($_SESSION['votreChoixProduits'])) {
                $votreChoixProduits = $_SESSION['votreChoixProduits'];
                $this->addParam('titreSectionVotreChoix', 'Votre choix');
                $this->addParam('votreChoixProduits', $votreChoixProduits);
            }
           
            $populaireProduits = $_SESSION['populaireProduits'];
            $this->addParam('titreSectionPopulaire', 'Le plus populaire');
            $this->addParam('populaireProduits', $populaireProduits);

            $offreProduits = $_SESSION['offreProduits'];
            $this->addParam('titreSectionNosOffre', 'Nos offres');
            $this->addParam('offreProduits', $offreProduits);
            
            $filename = 'main';
            return $this->view($filename);
        }

        
        
        public function getPlusProduitOffre(){
            header("Content-Type:application/json; charset=utf-8");
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Headers: *');
            
            $offre = new ProduitManager();
            $offreProduits = $offre->getProduitOffre(count($_SESSION['offreProduits']),4);
            $_SESSION['offreProduits'] = array_merge($_SESSION['offreProduits'], $offreProduits);
            echo json_encode(Produit::toJson($offreProduits));
            // $this->redirect('/#produitOffre');
        }

        public function getProduitVotreChoix(){
            $votreChoixM = new ProduitManager();
        //     var_dump($this->get_httpRequest()->getParam());
        //    exit();
			$votreChoixProduits = $votreChoixM->getProduitVotreChoix($this->get_httpRequest()->getParam()['prix'],['categories'=>$this->get_httpRequest()->getParam()['categories'], 'fleures'=>$this->get_httpRequest()->getParam()['fleures'], 'couleures'=>$this->get_httpRequest()->getParam()['couleures']]);
           
            $_SESSION['votreChoixProduits'] = $votreChoixProduits;
            $this->redirect('/');
        }
		
        
 
        public function  getProduitVotreChoixByCategorie(){
            $votreChoixM = new ProduitManager();
			$votreChoixProduits = $votreChoixM->getProduitVotreChoixByCategorie($this->get_httpRequest()->getParam()['idcategorie']);
            $_SESSION['votreChoixProduits'] = $votreChoixProduits;
            $this->redirect('/');
        }
}