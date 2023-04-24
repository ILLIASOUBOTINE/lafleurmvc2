<?php
	class AccountController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
            $this->addParam('title','Account');
		}
        
		public function identification(){
			if (isset($_SESSION['client'])) {
				$this->redirect('./monAccount');
			}else{
				$filename = 'identification' ;
            	return $this->view($filename);
			} 
          
        }

		public function inscription(){
			$filename = AccountController::inscriptionAccount($this);
			return $this->view($filename);
		
		}
        
		public static function inscriptionAccount($thisController){
           $clientM = new ClientManager();
		   $email = $thisController->get_httpRequest()->getParam()['email'];
		   $password = password_hash($thisController->get_httpRequest()->getParam()['password'],PASSWORD_BCRYPT);
		
		   if ($clientM->getByEmail($email)) {
				$messageError = 'Un utilisateur avec le même nom existe déjà';
				$thisController->addParam('messageError',$messageError);
				$filename = 'identification';
				
			}else {
				$response = $clientM->create(['email','mot_passe'],[$email,$password]);
				if (is_a($response, 'PDOException')){
				
					$messageError = AccountController::getMessageError($response->getMessage());
					$thisController->addParam('messageError',$messageError);
					$filename = 'identification';
					
				}else {
					$messageSucces = 'Votre compte a été créé';
					$thisController->addParam('messageSucces',$messageSucces);
					$filename = 'connexion' ;
            		
				}
			}

			return $filename;
		}
		
		public function connexion(){
			$filename = AccountController::connexionAccount($this);
			if ($filename === true ) {
				$this->redirect('./monAccount');
			}else{
				return $this->view($filename);
			}
		}
		
		
        public static function connexionAccount($thisController){
            $clientM = new ClientManager();
			$email = $thisController->get_httpRequest()->getParam()['email'];
			$password = $thisController->get_httpRequest()->getParam()['password'];
			
			$client = $clientM->getByEmail($email);
		   if (!$client || empty($client->getEmail())) {
				$messageError = "email n'est pas correct";
				$thisController->addParam('messageError',$messageError);
				$filename = 'connexion' ;
            	
			}else {
				if (password_verify($password,$client->getMotPasse())) {
				
					$_SESSION['client'] = $client;
					$filename = true ;
					
				}else {
					$messageError = "password n'est pas correct";
					$thisController->addParam('messageError',$messageError);
					$filename = 'connexion' ;
					
				}
				
			}
			return $filename;
		}

		public function monAccount() {
			if (isset($_SESSION['client'])) {
				$client = $_SESSION['client'];
				$this->addParam('client',$client);
				
				$commandesM = new CommandeManager();
				$commandes = $commandesM->getCommandeByIdClient($client->getIdClient());
				foreach($commandes as $commande){
					$commande->getAllCommandeConstruct();
				}
				$this->addParam('commandes',$commandes);
				
				$filename = 'monaccount';
				return $this->view($filename);
			} else {
				$this->redirect('./account');
			}
		}

		public function logOut() {
			unset($_SESSION['client']);
			$this->redirect('./account');
		}

		
		public static function getMessageError($strError) {
			$messageError = '';
			if (preg_match('/\bDuplicate\b/', $strError)) {
				$messageError = 'Un utilisateur avec le même nom existe déjà';
			}elseif(preg_match('/\btoo long\b/', $strError)){
				$messageError = 'too long';
			} else {
				$messageError = 'other faute';
			}
			return $messageError;
		}
	
		
	}