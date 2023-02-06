<?php
	class NotreLivraison
	{
		private $idnotre_livraison;
		private $nom_ville;
		
		
		public function __construct()
		{
			
		}

		public function getNomVille(){
			return $this->nom_ville;
		}
		
	}