<?php
	class CategorieManager extends BaseManager
	{
		public function __construct()
		{
			parent::__construct("categorie","Categorie");	
		}
		
		public function getCategoriesByIdProduit($id)
		{
			$req = $this->_bdd->prepare("SELECT categorie.* FROM categorie JOIN categorie_has_produit ON categorie.idcategorie = categorie_idcategorie WHERE produit_idproduit  = :id");
			$req->bindValue(':id', $id, PDO::PARAM_INT);
			$req->execute();
			return $req->fetchAll(PDO::FETCH_CLASS,"Categorie");
		}
	}

  