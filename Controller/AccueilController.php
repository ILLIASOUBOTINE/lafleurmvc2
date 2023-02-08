<?php



	class AccueilController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
            $this->addParam('title','Accueil');
		}
        
		public function show(){
            
            $villes = $_SESSION['villes'];
            $offreProduits = $_SESSION['offreProduits'];
            $populaireProduits = $_SESSION['populaireProduits'];
            
           
           
            $this->addParam('titreSectionNosOffre', 'Nos offres');
            $this->addParam('offreProduits', $offreProduits);
          
            $this->addParam('titreSectionPopulaire', 'Le plus populaire');
            $this->addParam('populaireProduits', $populaireProduits);
            // $this->addParam('secPop', $secPop);
            $this->addParam('villes',$villes);
            // var_dump( $villes);
            $filename = 'main' ;
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
		
        
	
 
	
}