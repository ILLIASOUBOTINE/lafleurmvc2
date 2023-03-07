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
			$_SESSION['commande'] = $commande;
			$this->addParam('commande',$commande);
			
			$filename = 'recapitulatif';
			return $this->view($filename);
		}


		public function paiement(){
			$filename = 'paiement';
			return $this->view($filename);
		}

		public function controlPaiement(){
			$commande = $_SESSION['commande'];
			$idLivraison = $this->createLivraisonBD();
			$idCommande = $this->createCommandeBD($idLivraison);
			CommandeHasProduit::createCommandeHasProduitInBD($commande,$idCommande);
			
			$filename = 'paiement';
			return $this->view($filename);
		}
	
		public function createLivraisonBD(){
			$livraison = $_SESSION['commande']->getLivraison();
			$date_prevu = $livraison->getDatePrevu();
			$notre_livraison_idnotre_livraison = $livraison->getNotreLivraisonIdnotreLivraison();
			$rue = $livraison->getRue();
			$num_maison = $livraison->getNumMaison();
			$num_appart = $livraison->getNumAppart();
			$num_telephone = $livraison->getNumTelephone();
			
			$livraisonM = new LivraisonManager();
			$params = ['date_prevu','notre_livraison_idnotre_livraison','rue','num_maison','num_appart','num_telephone'];
			$values = [$date_prevu,$notre_livraison_idnotre_livraison,$rue,$num_maison,$num_appart,$num_telephone];
			$reponse = $livraisonM->create($params,$values);
			return intval($reponse);
			// var_dump($reponse);
			// exit;
			
		}

		public function createCommandeBD($idlivraison){
			$commande = $_SESSION['commande'];
			$client_idclient = $commande->getClientIdclient();
			$num_commande = $commande->getNumCommande();
			$livraison_idlivraison = $idlivraison;
			$frais_livraison = $commande->getFraisLivraison();
			
			$commandeM = new CommandeManager();
			$params = ['client_idclient', 'num_commande','livraison_idlivraison','frais_livraison'];
			$values = [$client_idclient,$num_commande,$livraison_idlivraison,$frais_livraison];
			$reponse = $commandeM->create($params,$values);
			return intval($reponse);
			// var_dump($reponse);
			// exit;
			
		}
		
	}