<?php
	class CommandeController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
            $this->addParam('title','Commande');
		}
        
		public function identification(){
			
			$filename = 'identification' ;
		  
			return $this->view($filename);
        }
        
		public function livraison(){
			// $villesM = new NotreLivraisonManager();
			$villes = $_SESSION['villes'];
			$this->addParam('villes',$villes);
			
			if (isset($_SESSION['livraison'])) {
				$livraison = $_SESSION['livraison'];
				$this->addParam('livraison',$livraison);
			}
			
			
			$filename = 'livraison' ;
			return $this->view($filename);
		} 
		
        public function inscription(){
			$filename = AccountController::inscriptionAccount($this);
			return $this->view($filename);
		}
		 
		public function connexion(){
			$filename = AccountController::connexionAccount($this);
			if ($filename === true ) {
				$this->redirect('/etapeLivraison');
			}else{
				return $this->view($filename);
			}
		}

		public function controlFormLivraison(){
			$livraisonM = new LivraisonManager();
			$date_prevu = $this->get_httpRequest()->getParam()['date_prevu'];
			$id_ville = $this->get_httpRequest()->getParam()['id_ville'];
			$rue = $this->get_httpRequest()->getParam()['rue'];
			$num_maison = $this->get_httpRequest()->getParam()['num_maison'];
			$num_appart = $this->get_httpRequest()->getParam()['num_appart'];
			$num_telephone = $this->get_httpRequest()->getParam()['num_telephone'];

			$livraison = Livraison::createLivraisonConstruct($date_prevu,$id_ville,$rue,$num_maison,$num_appart,$num_telephone);
			
			if (true) {
				// $response = $livraisonM->create(['date_prevu','notre_livraison_idnotre_livraison','rue','num_maison','num_appart','num_telephone'],[$date_prevu,$id_ville,$rue,$num_maison,$num_appart,$num_telephone]);
				//  if (is_a($response, 'PDOException')){
				//  // echo $response->getMessage();
				// 	 $messageError = AccountController::getMessageError($response->getMessage());
				// 	 $this->addParam('messageError',$messageError);
				// 	 $filename = 'identification';
				// 	 return $this->view($filename);
				//  }else {
				// 	 $messageSucces = 'Votre compte a été créé';
				// 	 $this->addParam('messageSucces',$messageSucces);
				// 	 $filename = 'connexion';
				// 	 return $this->view($filename);
				//  }
			
				// $strLivraison = '{"date_prevu":"'.$date_prevu.'","id_ville":'.$id_ville.',"rue":"'.$rue.'","num_maison":"'.$num_maison.'","num_appart":"'.$num_appart.'","num_telephone":"'.$num_telephone.'"}';
				// $_SESSION['livraison'] = json_decode($strLivraison);
				$_SESSION['livraison'] = $livraison;

				$strPanier = $this->get_httpRequest()->getParam()['dataPanier'];
				$_SESSION['panier'] = json_decode($strPanier);
				$this->redirect('/etapeRecapitulatif');
			}
		}
	
		public function recapitulatif(){

			$livraison = $_SESSION['livraison'];
			$this->addParam('livraison',$livraison);
			
			
			$client = $_SESSION['client'];
			$this->addParam('client',$client);
			
			$panier = $_SESSION['panier'];
			$this->addParam('panier',$panier);
				
			$produitM = new ProduitManager();
			$produits = $produitM->getProduitPanier($panier);

			foreach($produits as $produit){
				foreach($panier as $produitP){
					if ($produit->getIdproduit() == $produitP->id) {
						$produit->setQuantitePanier($produitP->quantite);
						$produit->setPrixPanier(number_format($produit->getQuantitePanier()*$produit->getPrixUnite(),2));
					}
				}
			}
			$this->addParam('produits',$produits);
			
			$commande = Commande::createCommandeConstruct($produits,$livraison,$client);
			$this->addParam('commande',$commande);
			
			$filename = 'recapitulatif';
			return $this->view($filename);
		}
	
	}