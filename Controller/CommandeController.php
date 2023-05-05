<?php
	class CommandeController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
            $this->addParam('title','Commande');
		}
        
		public function identification(){
			unset($_SESSION['messageError']);
			unset($_SESSION['arrErrorsLivraison']);
			
			if (isset($_SESSION['client'])) {
				$this->redirect('/etapeLivraison');
				
			}
			
			$filename = 'identification' ;
		  
			return $this->view($filename);
        }

		public function identificationLogout(){
			
			unset($_SESSION['client']);
			
			$this->redirect('/etapeIdentification');
        }
		
		
        
		public function livraison(){
			if (!isset($_SESSION['client'])) {
				$this->redirect('/etapeIdentification');
			}
			// $villesM = new NotreLivraisonManager();
			$villes = $_SESSION['villes'];
			$this->addParam('villes',$villes);

			
			if (isset($_SESSION['messageError'])) {
				$messageError = $_SESSION['messageError'];
				$this->addParam('messageError',$messageError);
			}

			if (isset($_SESSION['arrErrorsLivraison'])) {
				$arrErrorsLivraison = $_SESSION['arrErrorsLivraison'];
				$this->addParam('arrErrorsLivraison',$arrErrorsLivraison);
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
				$this->redirect('/etapeLivraison');
			}else{
				return $this->view($filename);
			}
		}

		public function controlFormLivraison(){
			if (!isset($_SESSION['client'])) {
				$this->redirect('/etapeIdentification');
			}
			$arrErrorsLivraison = [];
		
			$id_ville = $this->get_httpRequest()->getParam()['id_ville'];
			$rue = $this->get_httpRequest()->getParam()['rue'];
			
			if (!(isset($rue) && strlen(trim($rue)) > 0 && strlen(trim($rue)) <= 45)) {
				$arrErrorsLivraison[] = "Le champ 'rue' doit être renseigné et ne doit pas contenir plus de 45 caractèreset et ne doit pas contenir de caractères '<' ou '>'!";
			}
			$num_maison = $this->get_httpRequest()->getParam()['num_maison'];
			if (!(isset($num_maison) && strlen(trim($num_maison)) > 0 && strlen(trim($num_maison)) <= 5)) {
				$arrErrorsLivraison[] = "Le champ 'numéro de maison' doit être renseigné et ne doit pas contenir plus de 5 caractères et ne doit pas contenir de caractères '<' ou '>'!";
			}
			$num_appart = $this->get_httpRequest()->getParam()['num_appart'];
			if (!(isset($num_appart) && strlen(trim($num_appart)) > 0 && strlen(trim($num_appart)) <= 5) || !(isset($num_appart)) ) {
				$arrErrorsLivraison[] = "Le champ 'numéro d'appartement' ne doit pas contenir plus de 5 caractères et ne doit pas contenir de caractères '<' ou '>'!";
			}
			$num_telephone = $this->get_httpRequest()->getParam()['num_telephone'];
			if (!(isset($num_telephone) && preg_match('/^0[0-9]{9}$/', $num_telephone))) {
				$arrErrorsLivraison[] = "Le champ 'numéro de téléphone' doit respecter le format: 0 ********* !";
			}
			
			$date_prevu = $this->get_httpRequest()->getParam()['date_prevu'];
			if (!(!empty($date_prevu) && ($date = DateTime::createFromFormat('Y-m-d', $date_prevu)) !== false && $date->getTimestamp() >= strtotime('tomorrow') && $date->getTimestamp() <= strtotime('+1 month'))) {
				$arrErrorsLivraison[] = "Le champ 'date de livraison' doit contenir une date entre demain et plus 30 jours à partir d'aujourd'hui!";
			}
			$_SESSION['arrErrorsLivraison'] = $arrErrorsLivraison;
			
			$livraison = Livraison::createLivraisonConstruct($date_prevu,$id_ville,$rue,$num_maison,$num_appart,$num_telephone);
			$_SESSION['livraison'] = $livraison;
			
			if (count($arrErrorsLivraison) == 0) {
				$strPanier = $this->get_httpRequest()->getParam()['dataPanier'];
				
				$_SESSION['panier'] = json_decode($strPanier);
			// 	echo($strPanier);
			// 	echo(json_last_error());
			// exit;
				unset($_SESSION['messageError']);
				unset($_SESSION['arrErrorsLivraison']);
				$this->redirect('/etapeRecapitulatif');
			}else {
				unset($_SESSION['messageError']);
				$this->redirect('/etapeLivraison');
			}
		}
	
		public function recapitulatif(){
			if (!isset($_SESSION['client'])) {
				$this->redirect('/etapeIdentification');
			}
			$panier = $_SESSION['panier'];
			// var_dump($_SESSION['panier']);
			// exit;
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
				$this->redirect('/etapeLivraison');
			}else {
				
				$livraison = $_SESSION['livraison'];
				$this->addParam('livraison',$livraison);
				
				
				$client = $_SESSION['client'];
				$this->addParam('client',$client);
				
				// $produitM = new ProduitManager();
				// $produits = $produitM->getProduitPanier($panier);

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
			if (!isset($_SESSION['client']) && isset($_SESSION['commande'])) {
				$this->redirect('/etapeIdentification');
			}
			$filename = 'paiement';
			return $this->view($filename);
		}

		public function controlPaiement(){
			if (!isset($_SESSION['client']) && isset($_SESSION['commande'])) {
				$this->redirect('/etapeIdentification');
			}
			
			$commande = $_SESSION['commande'];
			$idLivraison = Livraison::createLivraisonDansBD();
			$idCommande = Commande::createCommandeDansBD($idLivraison);
			CommandeHasProduit::createCommandeHasProduitInBD($commande,$idCommande);
			
			$_SESSION['idcommande'] = $idCommande;
			
			// var_dump($commande);
			// exit;
			$commande->modifQuantiteProduitTotalDansBD();
			
			///////////// send email //////////////
			$mail = $commande->getClient()->getEmail();
			$numCommande = $idCommande;
			$messageCommande = $this->messageCommande($commande,$idCommande);
			$this->sendMailCommandeClient($mail, $numCommande, $messageCommande);
			
			///////////////
			
			unset($_SESSION['commande']);
			unset($_SESSION['essaiCadeau']);
			unset($_SESSION['panier']);
			$_SESSION['isPanierVide'] = true;
			$this->redirect('/etapeFinale');
		}

		public function etapeFinale(){
			if (!isset($_SESSION['client'])) {
				$this->redirect('/etapeIdentification');
			}
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
				// echo $message;
				// exit();
			}
			else {
				echo "ERROR";
				exit();
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