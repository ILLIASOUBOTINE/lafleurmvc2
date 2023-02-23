<?php
	class ClientManager extends BaseManager
	{
		public function __construct()
		{
			parent::__construct("client","Client");	
		}
		
		public function getByEmail($email)
		{
			$req = $this->_bdd->prepare('SELECT * FROM client WHERE client.email = :email');
			$req->bindValue(':email', $email);
			$req->execute();
			return $req->fetch(PDO::FETCH_ASSOC);
		}
	}

  