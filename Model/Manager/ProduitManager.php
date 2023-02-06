<?php
	class ProduitManager extends BaseManager
	{
		public function __construct()
		{
			parent::__construct("produit","Produit");	
		}
		
		public function getProduitPopulair($num)
		{
			$req = $this->_bdd->prepare("SELECT produit.*, photo.img_url 
				FROM produit join photo_has_produit on produit.idproduit = produit_idproduit join photo on photo_idphoto = photo.idphoto
			 	ORDER BY ventesTotales DESC LIMIT :num");
			$req->bindValue(':num', $num, PDO::PARAM_INT);
			$req->execute();
			// $req->setFetchMode(PDO::FETCH_CLASS,"Produit");
			$srt = $req->fetchAll(PDO::FETCH_CLASS,"Produit");
			return $srt;
		}

		// public function getProduitComplexById($id)
		// {
		// 	$req = $this->_bdd->prepare("SELECT produit.*, photo.img_url 
		// 		FROM produit join photo_has_produit on produit.idproduit = produit_idproduit join photo on photo_idphoto = photo.idphoto
		// 	 	ORDER BY ventesTotales DESC LIMIT :num");
		// 	$req->bindValue(':num', $id, PDO::PARAM_INT);
		// 	$req->execute();
		// 	$req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Produit");
		// 	return $req->fetchAll();
		// }
	}

  