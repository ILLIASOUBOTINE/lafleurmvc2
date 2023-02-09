<?php
	class Couleur
	{
		private $idcouleur;
		private  $nom;
		
		
		public function __construct()
		{
			
		}
		
		public function getIdCouleur(){
			return $this->idcouleur;
		}

		public function getNom(){
			return $this->nom;
		}


		
	}