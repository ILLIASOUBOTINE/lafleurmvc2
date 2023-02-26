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
			$villesM = new NotreLivraisonManager();
			$villes = $villesM->getAll();
			$this->addParam('villes',$villes);
			
			$filename = 'livraison' ;
			return $this->view($filename);
		} 
		
        public function inscription(){
			$clientM = new ClientManager();
			$email = $this->get_httpRequest()->getParam()['email'];
			$password = password_hash($this->get_httpRequest()->getParam()['password'],PASSWORD_BCRYPT);
		
			if ($clientM->getByEmail($email)) {
				 $messageError = 'Un utilisateur avec le même nom existe déjà';
				 $this->addParam('messageError',$messageError);
				 $filename = 'identification';
				 return $this->view($filename);
			 }else {
				 $response = $clientM->create(['email','mot_passe'],[$email,$password]);
				 if (is_a($response, 'PDOException')){
				 // echo $response->getMessage();
					 $messageError = AccountController::getMessageError($response->getMessage());
					 $this->addParam('messageError',$messageError);
					 $filename = 'identification';
					 return $this->view($filename);
				 }else {
					 $messageSucces = 'Votre compte a été créé';
					 $this->addParam('messageSucces',$messageSucces);
					 $filename = 'connexion' ;
					 return $this->view($filename);
				 }
				 
			 }
			 
		}
		 
		public function connexion(){
			 $clientM = new ClientManager();
			 $email = $this->get_httpRequest()->getParam()['email'];
			 $password = $this->get_httpRequest()->getParam()['password'];
			
			 $client = $clientM->getByEmail($email);
			if (!$client) {
				 $messageError = "email n'est pas correct";
				 $this->addParam('messageError',$messageError);
				 $filename = 'connexion' ;
				 return $this->view($filename);
			 }else {
				 if (password_verify($password,$client->getMotPasse())) {
				 
					 $_SESSION['clientCommande'] = $client;
					 $this->redirect('/etapeLivraison');
				 }else {
					 $messageError = "password n'est pas correct";
					 $this->addParam('messageError',$messageError);
					 $filename = 'connexion' ;
					 return $this->view($filename);
				 }
				 
			 }
			 
		}

		public function controlFormLivraison(){
			if (true) {
				$this->redirect('/etapeRecapitulatif');
			}
		}
	
		public function recapitulatif(){
			$filename = 'recapitulatif' ;
			return $this->view($filename);
		}
	
	}