<?php
	class PhotoManager extends BaseManager
	{
		public function __construct()
		{
			parent::__construct("photo","Photo");	
		}
		
		public function getPhotosByIdProduit($id)
		{
			$req = $this->_bdd->prepare("SELECT photo.* FROM photo_has_produit join photo on photo_idphoto = photo.idphoto WHERE produit_idproduit = :id");
			$req->bindValue(':id', $id, PDO::PARAM_INT);
			$req->execute();
			// $req->setFetchMode(PDO::FETCH_CLASS,"Produit");
			$srt = $req->fetchAll(PDO::FETCH_CLASS,"Photo");
			return $srt;
		}
	
	}

  