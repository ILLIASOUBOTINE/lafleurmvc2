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
				// $client = $_SESSION['client'];
				// $this->addParam('client',$client);
				// $filename = 'monaccount';
            	// return $this->view($filename);
				$this->redirect('/monAccount');
			}else{
				$filename = 'identification' ;
            	return $this->view($filename);
			} 
          
        }
        
		public function inscription(){
           $clientM = new ClientManager();
		   $email = $this->get_httpRequest()->getParam()['email'];
		   $password = password_hash($this->get_httpRequest()->getParam()['password'],PASSWORD_BCRYPT);
		//    var_dump($clientM->getByEmail($email));
		//    var_dump($this->get_httpRequest()->getParam()['email']);
		//    exit;
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
			//    var_dump($clientM->getByEmail($email));
			//    var_dump($this->get_httpRequest()->getParam()['email']);
			//    exit;
			$client = $clientM->getByEmail($email);
		   if (!$client) {
				$messageError = "email n'est pas correct";
				$this->addParam('messageError',$messageError);
				$filename = 'connexion' ;
            	return $this->view($filename);
			}else {
				if (password_verify($password,$client->getMotPasse())) {
				
					$_SESSION['client'] = $client;
					$this->redirect('/monAccount');
				}else {
					$messageError = "password n'est pas correct";
					$this->addParam('messageError',$messageError);
					$filename = 'connexion' ;
					return $this->view($filename);
				}
				
			}
			
		}

		public function monAccount() {
			$client = $_SESSION['client'];
			$this->addParam('client',$client);
			$filename = 'monaccount';
            return $this->view($filename);
		}

		public function logOut() {
			unset($_SESSION['client']);
			$this->redirect('/account');
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
	
		// public function ($email,$clientM) {
			
			
		// }
	
	}