<?php
	class BanniereManager extends BaseManager
	{
		public function __construct()
		{
			parent::__construct("banniere_event","Banniere");	
		}
		
		public function getEventActuel(){
			$req = $this->_bdd->prepare('SELECT * FROM banniere_event WHERE :today BETWEEN banniere_event.date_debut AND banniere_event.date_fin');
			$today = date('Y-m-d');
			$req->bindValue(':today',$today, PDO::PARAM_STR);
			$req->execute();
			$srt = $req->fetchAll(PDO::FETCH_CLASS,"Banniere");
			return $srt;
		}
	
	}

  