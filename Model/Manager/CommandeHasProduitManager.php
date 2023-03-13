<?php
	class CommandeHasProduitManager extends BaseManager
	{
		public function __construct()
		{
			parent::__construct("produit_has_commandes","CommandeHasProduit");	
		}
		
		public function getProduitsByCommande($id)
		{
			$req = $this->_bdd->prepare('SELECT * FROM produit_has_commandes WHERE commandes_idcommandes = :id');
			$req->bindValue(':id',$id, PDO::PARAM_INT);
			$req->execute();
			$srt = $req->fetchAll(PDO::FETCH_CLASS,"CommandeHasProduit");
			return $srt;
		}
	}

  