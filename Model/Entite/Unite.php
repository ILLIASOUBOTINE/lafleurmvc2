<?php
	class Unite
	{
		private $idunite;
		private $nom;
		
		
		public function __construct()
		{
			
		}
		
		/**
		 * Get the value of idunite
		 */
		public function getIdunite()
		{
			return $this->idunite;
		}

		/**
		 * Get the value of nom
		 */
		public function getNom()
		{
			return $this->nom;
		}

		/**
		 * Set the value of nom
		 */
		public function setNom($nom)
		{
			$this->nom = $nom;
		}

		public  function getUniteArrayAsso()
		{
			return   array(
				"idunite" => $this->idunite,
				"nom" => $this->nom,
			);
			
		}
	}