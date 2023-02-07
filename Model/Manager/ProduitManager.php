<?php
	class ProduitManager extends BaseManager
	{
		public function __construct()
		{
			parent::__construct("produit","Produit");	
		}
		
		public function getProduitPopulair($num)
		{
			$req = $this->_bdd->prepare("SELECT produit.* FROM produit 
			 	ORDER BY ventesTotales DESC LIMIT :num");
			$req->bindValue(':num', $num, PDO::PARAM_INT);
			$req->execute();
			// $req->setFetchMode(PDO::FETCH_CLASS,"Produit");
			$srt = $req->fetchAll(PDO::FETCH_CLASS,"Produit");
			return $srt;
		}

		public function getProduitDetailsById($id)
		{
			$req = $this->_bdd->prepare("SELECT * FROM produit WHERE produit.idproduit = :id");
			$req->bindValue(':id', $id, PDO::PARAM_INT);
			$req->execute();
			$req->setFetchMode(PDO::FETCH_CLASS,"Produit");
			$srt = $req->fetch();
			return $srt;
		}
	}

  