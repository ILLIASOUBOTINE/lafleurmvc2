<?php
	class Banniere
	{
		private $idbanniere_event;
		private  $titre;
		private  $description;
		private  $date_debut;
		private  $date_fin;
		private  $photo_idphoto;
		
		
		private  $photo;
		
		
		public function __construct()
		{
			$photoM = new PhotoManager();
			$this->photo = $photoM->getById($this->photo_idphoto);
			
			
		}
		
		/**
		 * Get the value of idbanniere_event
		 */
		public function getIdbanniereEvent()
		{
				return $this->idbanniere_event;
		}

		/**
		 * Get the value of titre
		 */
		public function getTitre()
		{
				return $this->titre;
		}

		/**
		 * Set the value of titre
		 */
		public function setTitre($titre)
		{
				$this->titre = $titre;

				
		}

		/**
		 * Get the value of description
		 */
		public function getDescription()
		{
				return $this->description;
		}

		/**
		 * Set the value of description
		 */
		public function setDescription($description)
		{
				$this->description = $description;

				
		}

		/**
		 * Get the value of date_debut
		 */
		public function getDateDebut()
		{
				return $this->date_debut;
		}

		/**
		 * Set the value of date_debut
		 */
		public function setDateDebut($date_debut)
		{
				$this->date_debut = $date_debut;

				
		}

		/**
		 * Get the value of date_fin
		 */
		public function getDateFin()
		{
				return $this->date_fin;
		}

		/**
		 * Set the value of date_fin
		 */
		public function setDateFin($date_fin)
		{
				$this->date_fin = $date_fin;

				
		}

		/**
		 * Get the value of photo_idphoto
		 */
		public function getPhotoIdphoto()
		{
				return $this->photo_idphoto;
		}

		/**
		 * Set the value of photo_idphoto
		 */
		public function setPhotoIdphoto($photo_idphoto)
		{
				$this->photo_idphoto = $photo_idphoto;

				
		}

		/**
		 * Get the value of photo
		 */
		public function getPhoto()
		{
				return $this->photo;
		}

		

		
	}