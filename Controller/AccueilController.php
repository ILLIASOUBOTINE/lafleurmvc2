<?php



	class AccueilController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
            $this->addParam('title','Accueil');
		}
        
		public function show(){
            
            
            $offreProduits = $_SESSION['offreProduits'];
            $populaireProduits = $_SESSION['populaireProduits'];
            
           
           
            $this->addParam('titreSectionNosOffre', 'Nos offres');
            $this->addParam('offreProduits', $offreProduits);
          
            $this->addParam('titreSectionPopulaire', 'Le plus populaire');
            $this->addParam('populaireProduits', $populaireProduits);
            
            if (isset($_SESSION['votreChoixProduits'])) {
                $votreChoixProduits = $_SESSION['votreChoixProduits'];
                $this->addParam('titreSectionVotreChoix', 'Votre choix');
                $this->addParam('votreChoixProduits', $votreChoixProduits);
            }
            
           
            $filename = 'main';
            return $this->view($filename);
        }
        
        public function getPlusProduitOffre(){
            $offre = new ProduitManager();
            $offreProduits = $offre->getProduitOffre(count($_SESSION['offreProduits']),4);
          
            $_SESSION['offreProduits'] = array_merge($_SESSION['offreProduits'], $offreProduits);
            $this->redirect('/#produitOffre');
            
            // header('Location: /');
            // exit;
            
        }

        public function getProduitVotreChoix(){
            $votreChoixM = new ProduitManager();
			
           $votreChoixProduits = $votreChoixM->getProduitVotreChoix($this->get_httpRequest()->getParam()['prix'],['categories'=>$this->get_httpRequest()->getParam()['categories'], 'fleures'=>$this->get_httpRequest()->getParam()['fleures'], 'couleures'=>$this->get_httpRequest()->getParam()['couleures']]);
           $_SESSION['votreChoixProduits'] = $votreChoixProduits;
           
			
            $this->redirect('/');
        }
		
        
 
	
}