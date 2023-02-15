<?php
	class Categorie
	{
		private  $idcategorie;
		private  $nom;
		
		
		public function __construct()
		{
			
		}

		/**
		 * Get the value of idcategorie
		 *
		 * @return int
		 */
		public function getIdcategorie()
		{
				return $this->idcategorie;
		}

		/**
		 * Get the value of nom
		 *
		 * @return string
		 */
		public function getNom()
		{
				return $this->nom;
		}

		/**
		 * Set the value of nom
		 *
		 * @param string $nom
		 *
		 * @return self
		 */
		public function setNom(string $nom)
		{
				$this->nom = $nom;

				return $this;
		}

		public  function getCategorieArrayAsso()
		{
			return   array(
				"idcategorie" => $this->idcategorie,
				"nom" => $this->nom,
			);
			
		}
	}