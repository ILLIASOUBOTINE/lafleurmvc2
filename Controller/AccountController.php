<?php
	class AccountController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
            $this->addParam('title','Account');
		}
        
		public function identification(){
           
			
			$filename = 'identification' ;
            return $this->view($filename);
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
					$filename = 'identification';
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
		   if (!$clientM->getByEmail($email)) {
				$messageError = "email n'est pas correct";
				$this->addParam('messageError',$messageError);
				$filename = 'identification';
				return $this->view($filename);
			}else {
				
				
				
					if (password_verify($password,$clientM->getByEmail($email)["mot_passe"])) {
						$messageSucces = 'Mon account';
						$this->addParam('messageSucces',$messageSucces);
						$filename = 'identification';
						return $this->view($filename);
					}
					$messageError = "password n'est pas correct";
					$this->addParam('messageError',$messageError);
					$filename = 'identification';
					return $this->view($filename);
			}
				
			
		
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
	
		// public static function is_emailExist($email,$clientM) {
		// 	$messageError = '';
		// 	if (!$clientM->getByEmail($email)) {
		// 		$messageError = 'Un utilisateur avec le même nom existe déjà';
		// 		$this->addParam('messageError',$messageError);
		// 	} 
			
		// }
	
	}