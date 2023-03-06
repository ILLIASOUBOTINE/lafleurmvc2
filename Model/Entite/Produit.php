<?php
	class Produit
	{
		private  $idproduit;
		private  $nom;
		private  $longueur;
		private  $prix_unite;
		private  $description;
		private  $quantiteTotale;
		private  $unite_idunite;
		private  $ventesTotales;
		// private  $img_url;
		private  $disponible;
		
		private  $photos;
		private  $categories;
		private  $unite;
		private  $fleures;
		
		private $quantitePanier;
		
		
		public function __construct()
		{
			$this->affichDisponible($this);
			
			$photosM = new PhotoManager();
			$this->photos = $photosM->getPhotosByIdProduit($this->idproduit);
			
			$categorieM = new CategorieManager();
			$this->categories = $categorieM->getCategoriesByIdProduit($this->idproduit);

			$uniteM = new UniteManager();
			$this->unite = $uniteM->getById($this->unite_idunite)->getNom();

			$fleurM = new FleurManager();
			$this->fleures = $fleurM->getFleuresByIdProduit($this->idproduit);
		}


		

		public function affichDisponible($produit){
			
			if($produit->quantiteTotale == 0){
				$produit->disponible = "Rupture";
			}else{
				$produit->disponible = "Ajouter";
			}
		 
		}

		/**
		 * Get the value of idproduit
		 *
		 * @return int
		 */
		public function getIdproduit()
		{
				return $this->idproduit;
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
		public function setNom($nom)
		{
				$this->nom = $nom;

				return $this;
		}

		/**
		 * Get the value of longueur
		 *
		 * @return int
		 */
		public function getLongueur()
		{
				return $this->longueur;
		}

		/**
		 * Set the value of longueur
		 *
		 * @param int $longueur
		 *
		 * @return self
		 */
		public function setLongueur($longueur)
		{
				$this->longueur = $longueur;

				return $this;
		}

		/**
		 * Get the value of prix_unite
		 *
		 * @return float
		 */
		public function getPrixUnite()
		{
				return $this->prix_unite;
		}

		/**
		 * Set the value of prix_unite
		 *
		 * @param float $prix_unite
		 *
		 * @return self
		 */
		public function setPrixUnite( $prix_unite)
		{
				$this->prix_unite = $prix_unite;

				return $this;
		}

		/**
		 * Get the value of description
		 *
		 * @return string
		 */
		public function getDescription()
		{
				return $this->description;
		}

		/**
		 * Set the value of description
		 *
		 * @param string $description
		 *
		 * @return self
		 */
		public function setDescription($description)
		{
				$this->description = $description;

				return $this;
		}

		/**
		 * Get the value of quantiteTotale
		 *
		 * @return int
		 */
		public function getQuantiteTotale()
		{
				return $this->quantiteTotale;
		}

		/**
		 * Set the value of quantiteTotale
		 *
		 * @param int $quantiteTotale
		 *
		 * @return self
		 */
		public function setQuantiteTotale($quantiteTotale)
		{
				$this->quantiteTotale = $quantiteTotale;

				return $this;
		}

		/**
		 * Get the value of unite_idunite
		 *
		 * @return int
		 */
		public function getUniteIdunite()
		{
				return $this->unite_idunite;
		}

		

		/**
		 * Set the value of unite_idunite
		 *
		 * @param int $unite_idunite
		 *
		 * @return self
		 */
		public function setUniteIdunite($unite_idunite)
		{
				$this->unite_idunite = $unite_idunite;

				return $this;
		}

		/**
		 * Get the value of ventesTotales
		 *
		 * @return int
		 */
		public function getVentesTotales()
		{
				return $this->ventesTotales;
		}

		/**
		 * Set the value of ventesTotales
		 *
		 * @param int $ventesTotales
		 *
		 * @return self
		 */
		public function setVentesTotales($ventesTotales)
		{
				$this->ventesTotales = $ventesTotales;

				return $this;
		}

		/**
		 * Get the value of img_url
		 *
		 * @return int
		 */
		public function getPhotos()
		{
				return $this->photos;
		}

		public function getPhotosArrayAsso()
		{
			$arr = [];
			foreach($this->photos as $photo ){
				$arr[] = $photo->getPhotoArrayAsso();
			}
				return $arr;
		}

		/**
		 * Set the value of img_url
		 *
		 * @param int $img_url
		 *
		 * @return self
		 */
		public function setPhotos( $photos)
		{
				$this->photos = $photos;

				return $this;
		}

		/**
		 * Get the value of disponible
		 *
		 * @return string
		 */
		public function getDisponible()
		{
				return $this->disponible;
		}

		public function getCategories()
		{
			return $this->categories;
		}
		
		public function getCategoriesArrayAsso()
		{
			$arr = [];
			foreach($this->categories as $categorie ){
				$arr[] = $categorie->getCategorieArrayAsso();
			}
				return $arr;
		}


		

		/**
		 * Get the value of fleures
		 *
		 * @return Fleur
		 */
		public function getFleures()
		{
				return $this->fleures;
		}

		/**
		 * Get the value of unite
		 */
		public function getUnite()
		{
				return $this->unite;
		}


		public static function toJson($offreProduits){
			$arrayProduits = array();
			foreach ($offreProduits as $produit) {
			   	$arrayProduits[] = array(
					"idproduit" => $produit->getIdproduit(),
					"nom" => $produit->getNom(),
					"longueur" => $produit->getLongueur(),
					"prix_unite" => $produit->getPrixUnite(),
					"description" => $produit->getDescription(),
					"quantiteTotale" => $produit->getQuantiteTotale(),
					"unite_idunite" => $produit->getUniteIdunite(),
					"ventesTotales" => $produit->getVentesTotales(),
					"disponible" => $produit->getDisponible(),
					"photos"=>$produit->getPhotosArrayAsso(),
					"categories"=>$produit->getCategoriesArrayAsso(),
					// "categories"=>$produit->getCategories(),
					"unite"=>$produit->getUnite(),
					"fleures"=>$produit->getFleures(),
				);
				
			}
		
			// Преобразование ассоциативного массива в JSON
			// $json = json_encode($arrayProduits);
			return $arrayProduits;
		}

		/**
		 * Get the value of quantitePanier
		 */
		public function getQuantitePanier()
		{
				return $this->quantitePanier;
		}

		/**
		 * Set the value of quantitePanier
		 */
		public function setQuantitePanier($quantitePanier)
		{
				$this->quantitePanier = $quantitePanier;

			
		}
	}