<?php
	class EspeceFleur
	{
		private $idespece_fleur;
		private  $nom;
		
		
		public function __construct()
		{
			
		}
		
		public function getIdEspeceFleur(){
			return $this->idespece_fleur;
		}

		public function getNom(){
			return $this->nom;
		}


		
	}