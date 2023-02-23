<?php
	class Client
	{
		private $idclient;
		private $email;
		private $mot_passe;
		
		public function getIdClient()
		{
			return $this->idclient;
		}
		
		public function getEmail()
		{
			return $this->email;
		}

		public function setEmail($email)
		{
			$this->email = $email;
		}

		public function getMotPasse()
		{
			return $this->mot_passe;
		}

		public function setMotPasse($motPasse)
		{
			$this->mot_passe = $motPasse;
		}

	}