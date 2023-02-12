<?php
	class Fleur
	{
		private $idfleures;
		private $longueur;
		private $couleur_idcouleur;
		private $unite_idunite;
		private $espece_fleur_idespece_fleur;
		private Couleur $couleur;
		private EspeceFleur $especeFleur;
		private Unite $unite;
		
		
		public function __construct()
		{
			$couleurM = new CouleurManager();
			$this->couleur = $couleurM->getById($this->couleur_idcouleur);

			$especeFleurM = new EspeceFleurManager();
			$this->especeFleur = $especeFleurM->getById($this->espece_fleur_idespece_fleur);

			$uniteM = new UniteManager();
			$this->unite = $uniteM->getById($this->unite_idunite);
		}
		
		/**
		 * Get the value of idfleures
		 */
		public function getIdfleures()
		{
				return $this->idfleures;
		}

		/**
		 * Get the value of longueur
		 */
		public function getLongueur()
		{
				return $this->longueur;
		}

		/**
		 * Set the value of longueur
		 */
		public function setLongueur($longueur)
		{
				$this->longueur = $longueur;

				
		}

		/**
		 * Get the value of couleur_idcouleur
		 */
		public function getCouleurIdcouleur()
		{
				return $this->couleur_idcouleur;
		}

		/**
		 * Set the value of couleur_idcouleur
		 */
		public function setCouleurIdcouleur($couleur_idcouleur)
		{
				$this->couleur_idcouleur = $couleur_idcouleur;

				
		}

		/**
		 * Get the value of unite_idunite
		 */
		public function getUniteIdunite()
		{
				return $this->unite_idunite;
		}

		/**
		 * Set the value of unite_idunite
		 */
		public function setUniteIdunite($unite_idunite)
		{
				$this->unite_idunite = $unite_idunite;

				
		}

		/**
		 * Get the value of espece_fleur_idespece_fleur
		 */
		public function getEspeceFleurIdespeceFleur()
		{
				return $this->espece_fleur_idespece_fleur;
		}

		/**
		 * Set the value of espece_fleur_idespece_fleur
		 */
		public function setEspeceFleurIdespeceFleur($espece_fleur_idespece_fleur)
		{
				$this->espece_fleur_idespece_fleur = $espece_fleur_idespece_fleur;

				
		}

		/**
		 * Get the value of couleur
		 *
		 * @return Couleur
		 */
		public function getCouleur(): Couleur
		{
				return $this->couleur;
		}

		

		/**
		 * Get the value of especeFleur
		 *
		 * @return EspeceFleur
		 */
		public function getEspeceFleur(): EspeceFleur
		{
				return $this->especeFleur;
		}

		

		/**
		 * Get the value of unite
		 *
		 * @return Unite
		 */
		public function getUnite(): Unite
		{
				return $this->unite;
		}

	
	}