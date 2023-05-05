<?php
	class FleurManager extends BaseManager{
		public function __construct(){
			parent::__construct("fleures","Fleur");	
		}
		
		public function getFleuresByIdProduit($id){
			$req = $this->_bdd->prepare("SELECT fleures.*,produit_has_fleures.quantite
			 	FROM fleures JOIN produit_has_fleures
				ON fleures.idfleures = fleures_idfleures 
				WHERE produit_idproduit  = :id");
			$req->bindValue(':id', $id, PDO::PARAM_INT);
			$req->execute();
			return $req->fetchAll(PDO::FETCH_CLASS,"Fleur");
		}
	}

  