<?php
	class Categorie
	{
		private int $idcategorie;
		private string $nom;
		
		
		public function __construct()
		{
			
		}

		/**
		 * Get the value of idcategorie
		 *
		 * @return int
		 */
		public function getIdcategorie(): int
		{
				return $this->idcategorie;
		}

		/**
		 * Get the value of nom
		 *
		 * @return string
		 */
		public function getNom(): string
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
		public function setNom(string $nom): self
		{
				$this->nom = $nom;

				return $this;
		}
	}