<?php
	class CommandeManager extends BaseManager
	{
		public function __construct()
		{
			parent::__construct("commandes","Commande");	
		}
		
		public function getCommandeByIdClient($id){
			$req = $this->_bdd->prepare('SELECT * FROM commandes WHERE commandes.client_idclient = :id');
			$req->bindValue('id',$id, PDO::PARAM_INT);
			$req->execute();
			$srt = $req->fetchAll(PDO::FETCH_CLASS,"Commande");
			return $srt;
		}
	}

  