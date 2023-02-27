<?php
	class Livraison
	{
		private $idlivraison;
		private $date_prevu;
		private $date_livre;
		private $notre_livraison_idnotre_livraison;
		private $rue;
		private $num_maison;
		private $num_appart;
		private $num_telephone;
		
		private $ville;
		
		public function __construct()
		{
			$villeM = new NotreLivraisonManager();
			$this->ville = $villeM->getById($this->notre_livraison_idnotre_livraison);
		}


		/**
		 * Get the value of idlivraison
		 */
		public function getIdlivraison()
		{
				return $this->idlivraison;
		}

		/**
		 * Get the value of date_prevu
		 */
		public function getDatePrevu()
		{
				return $this->date_prevu;
		}

		/**
		 * Set the value of date_prevu
		 */
		public function setDatePrevu($date_prevu): self
		{
				$this->date_prevu = $date_prevu;

				return $this;
		}

		/**
		 * Get the value of date_livre
		 */
		public function getDateLivre()
		{
				return $this->date_livre;
		}

		/**
		 * Set the value of date_livre
		 */
		public function setDateLivre($date_livre): self
		{
				$this->date_livre = $date_livre;

				return $this;
		}

		/**
		 * Get the value of notre_livraison_idnotre_livraison
		 */
		public function getNotreLivraisonIdnotreLivraison()
		{
				return $this->notre_livraison_idnotre_livraison;
		}

		/**
		 * Set the value of notre_livraison_idnotre_livraison
		 */
		public function setNotreLivraisonIdnotreLivraison($notre_livraison_idnotre_livraison): self
		{
				$this->notre_livraison_idnotre_livraison = $notre_livraison_idnotre_livraison;

				return $this;
		}

		/**
		 * Get the value of rue
		 */
		public function getRue()
		{
				return $this->rue;
		}

		/**
		 * Set the value of rue
		 */
		public function setRue($rue): self
		{
				$this->rue = $rue;

				return $this;
		}

		/**
		 * Get the value of num_maison
		 */
		public function getNumMaison()
		{
				return $this->num_maison;
		}

		/**
		 * Set the value of num_maison
		 */
		public function setNumMaison($num_maison): self
		{
				$this->num_maison = $num_maison;

				return $this;
		}

		/**
		 * Get the value of num_appart
		 */
		public function getNumAppart()
		{
				return $this->num_appart;
		}

		/**
		 * Set the value of num_appart
		 */
		public function setNumAppart($num_appart): self
		{
				$this->num_appart = $num_appart;

				return $this;
		}

		/**
		 * Get the value of num_telephone
		 */
		public function getNumTelephone()
		{
				return $this->num_telephone;
		}

		/**
		 * Set the value of num_telephone
		 */
		public function setNumTelephone($num_telephone): self
		{
				$this->num_telephone = $num_telephone;

				return $this;
		}

		/**
		 * Get the value of ville
		 */
		public function getVille()
		{
				return $this->ville;
		}

		/**
		 * Set the value of ville
		 */
		public function setVille($ville): self
		{
				$this->ville = $ville;

				return $this;
		}
	}