<?php
	class CommandeController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
            $this->addParam('title','Commande');
		}
        
		public function identification(){
			if (isset($_SESSION['client'])) {
				$this->redirect('./etapeLivraison');
				
			}
			$filename = 'identification' ;
		  
			return $this->view($filename);
        }

		public function identificationLogout(){
			
			unset($_SESSION['client']);
			
			$this->redirect('./etapeIdentification');
        }
		
		
        
		public function livraison(){
			// $villesM = new NotreLivraisonManager();
			$villes = $_SESSION['villes'];
			$this->addParam('villes',$villes);

			
			if (isset($_SESSION['messageError'])) {
				$messageError = $_SESSION['messageError'];
				$this->addParam('messageError',$messageError);
			}
			// $produitM = new ProduitManager();
			// $produit = $produitM->getById($id);
			
			if (isset($_SESSION['livraison'])) {
				$livraison = $_SESSION['livraison'];
				$this->addParam('livraison',$livraison);
			}else{
				$livraisonPrev = date("Y-m-d",mktime(0,0,0,date("m"),date("d")+1,date("Y")));
				$this->addParam('livraisonPrev',$livraisonPrev);
			}
			
			$livraisonMin = date("Y-m-d",mktime(0,0,0,date("m"),date("d")+1,date("Y")));
			$this->addParam('livraisonMin',$livraisonMin);

			$livraisonMax = date("Y-m-d",mktime(0,0,0,date("m")+1,date("d"),date("Y")));
			$this->addParam('livraisonMax',$livraisonMax);
			
			
			$filename = 'livraison';
			return $this->view($filename);
		} 
		
        public function inscription(){
			$filename = AccountController::inscriptionAccount($this);
			return $this->view($filename);
		}
		 
		public function connexion(){
			$filename = AccountController::connexionAccount($this);
			if ($filename === true ) {
				$this->redirect('./etapeLivraison');
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
				$this->redirect('./etapeRecapitulatif');
			}
		}
	
		public function recapitulatif(){
			
			$panier = $_SESSION['panier'];
			$this->addParam('panier',$panier);
			
			$produitM = new ProduitManager();
			$produits = $produitM->getProduitPanier($panier);
			
			//// vérifier s'il y a assez de produit /////
			$messageError = [];
			foreach($produits as $produit){
				foreach($panier as $produitP){
					if ($produit->getIdproduit() == $produitP->id) {
						if ($produitP->quantite > $produit->getQuantiteTotale()) {
							$messageError[] =  'nous n\'avons que '. $produit->getQuantiteTotale().' '. $produit->getNom() .' en stock';
							$subjectB = "le client n'avait pas assez de produit id: ".$produitP->id;
							$messageB = "le client voulait acheter: ".$produitP->quantite;
							$this->sendMailProduit($subjectB, $messageB);
						}
						// $produit->setQuantitePanier($produitP->quantite);
						// $produit->setPrixPanier(number_format($produit->getQuantitePanier()*$produit->getPrixUnite(),2));
						
					}
				}
			}
			
			if (count($messageError) > 0) {
				// var_dump($produits);
				
				// echo "<br>";
				// var_dump($messageError);
				// exit();
				
				$_SESSION['messageError'] = $messageError;
				$this->redirect('./etapeLivraison');
			}else {
				
				$livraison = $_SESSION['livraison'];
				$this->addParam('livraison',$livraison);
				
				
				$client = $_SESSION['client'];
				$this->addParam('client',$client);
				
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
				
				unset($_SESSION['messageError']);
				$filename = 'recapitulatif';
				return $this->view($filename);
			}
		}


		public function paiement(){
			$filename = 'paiement';
			return $this->view($filename);
		}

		public function controlPaiement(){
			$commande = $_SESSION['commande'];
			$idLivraison = Livraison::createLivraisonDansBD();
			$idCommande = Commande::createCommandeDansBD($idLivraison);
			CommandeHasProduit::createCommandeHasProduitInBD($commande,$idCommande);
			
			$_SESSION['idcommande'] = $idCommande;
			$commande->modifQuantiteProduitTotalDansBD();

			///////////// send email //////////////
			$mail = $commande->getClient()->getEmail();
			$numCommande = $idCommande;
			$messageCommande = $this->messageCommande($commande,$idCommande);
			$this->sendMailCommandeClient($mail, $numCommande, $messageCommande);
			
			///////////////
			
			
			
			unset($_SESSION['essaiCadeau']);
			unset($_SESSION['panier']);
			$_SESSION['isPanierVide'] = true;
			$this->redirect('./etapeFinale');
		}

		public function etapeFinale(){
			
			if (isset($_SESSION['isPanierVide']) && $_SESSION['isPanierVide']) {
				$isPanierVide = $_SESSION['isPanierVide'];
				$this->addParam('isPanierVide',$isPanierVide);
			}else {
				
				$this->addParam('isPanierVide',false);
			}
			unset($_SESSION['isPanierVide']);
			$filename = 'paiement_accepte';
			return $this->view($filename);
		}

	
		public function messageCommande($commande,$idCommande){
			$message1 = "Numéro du commande: ".$idCommande."\r\n".
				"Date de livraison: ".$commande->getLivraison()->getDatePrevu()."\r\n".
				"Adresse de livraison: "."\r\n".
				"ville: ".$commande->getLivraison()->getVille()->getNomVille()."\r\n".
				"rue: ".$commande->getLivraison()->getRue()."\r\n".
				"numéro de maison: ".$commande->getLivraison()->getNumMaison()."\r\n";
			
			$message3 = "Votre Panier: "."\r\n";
			foreach($commande->getProduits() as $produit) {
				$message10 = "Titre du produit: ".$produit->getNom()."\r\n".
				"Quantité: ".$produit->getQuantitePanier()."\r\n".
				"Prix: ".$produit->getPrixUnite()."\r\n";

				$message3 .= $message10;
			}
			
			
			$message2 = "Total: ".$commande->getPrixTotaleProduits()."\r\n".
				"frais de livraison: ".$commande->getFraisLivraison()."\r\n".
				"le montant payé: ".$commande->getPrixPayer()."\r\n";
			
			return $message1.$message3.$message2;
		}
	
	
		
		public function sendMailCommandeClient($mail, $numCommande, $messageCommande){
			
			// $to = "soubotineillia@gmail.com";
			$to = $mail;
			$subject = "Détails de la commande numéro: ".$numCommande;
			$message = $messageCommande;
			$from = "semenuk1991311@gmail.com";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= "From: <".$from.">\r\n";

			if (mail($to,$subject,$message,$headers)) {
				// echo "OK";
				// exit();
			}
			else {
				// echo "ERROR";
				//  exit();
			}

			
		}	

		public function sendMailProduit($subjectB, $messageB){
			
			$to = "soubotineillia@gmail.com";
			// $to = $mail;
			// $subject = "Détails de la commande numéro: ".$numProduit;
			$subject = $subjectB;
			$message = $messageB;
			$from = "semenuk1991311@gmail.com";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= "From: <".$from.">\r\n";

			if (mail($to,$subject,$message,$headers)) {
				// echo "OK";
				// echo $message;
				// exit();
			}
			else {
				// echo "ERROR";
				// exit();
			}
		}	
		
	}