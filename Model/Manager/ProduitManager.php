<?php
	class ProduitManager extends BaseManager
	{
		public function __construct()
		{
			parent::__construct("produit","Produit");	
		}
		
		public function getProduitPopulair($num)
		{
			$req = $this->_bdd->prepare("SELECT * FROM produit 
			 	ORDER BY ventesTotales DESC LIMIT :num");
			$req->bindValue(':num', $num, PDO::PARAM_INT);
			$req->execute();
			// $req->setFetchMode(PDO::FETCH_CLASS,"Produit");
			$srt = $req->fetchAll(PDO::FETCH_CLASS,"Produit");
			return $srt;
		}

		public function getProduitOffre($debut, $num)
		{
			$req = $this->_bdd->prepare("SELECT * FROM produit 
			WHERE produit.idproduit > :debut AND produit.idproduit <= :fin ORDER BY produit.idproduit DESC");
			$req->bindValue(':debut', $debut, PDO::PARAM_INT);
			$req->bindValue(':fin', $debut + $num, PDO::PARAM_INT);
			$req->execute();
			// $req->setFetchMode(PDO::FETCH_CLASS,"Produit");
			$srt = $req->fetchAll(PDO::FETCH_CLASS,"Produit");
			return $srt;
		}

		public function getProduitVotreChoix($prix, $params)
		{
			// ['categories'=>$categories, 'fleures'=>$fleurs, 'couleurs'=>$couleures]
			$req1 = 'SELECT produit.* FROM produit JOIN categorie_has_produit
			ON produit.idproduit = categorie_has_produit.produit_idproduit JOIN produit_has_fleures 
			ON  produit.idproduit = produit_has_fleures.produit_idproduit JOIN fleures
			ON produit_has_fleures.fleures_idfleures = fleures.idfleures WHERE prix_unite <= ?';
			
			// echo '<br>';
			// print_r($params);
			$paramsArr = [$prix];
			foreach($params as $key => $param){
				// echo '<br>';
				//  var_dump($param);
				array_shift($param);
				// var_dump($newArr);
				switch ($key) {
					case 'categories':
						if(count($param) > 0) {
							
							$str = implode(',', array_fill(0, count($param), '?'));
							$req1 .=' AND categorie_has_produit.categorie_idcategorie IN ('.$str.')';
							$paramsArr = array_merge($paramsArr, $param);
					
						}
					break;
					case 'fleures':
						if(count($param) > 0) {
							
							$str = implode(',', array_fill(0, count($param), '?'));
							$req1 .= ' AND fleures.espece_fleur_idespece_fleur IN ('.$str.')';
							$paramsArr = array_merge($paramsArr, $param);
		
						}
					break;
					case 'couleures':
						if(count($param) > 0) {
							
							$str = implode(',', array_fill(0, count($param), '?'));
							$req1 .= ' AND fleures.couleur_idcouleur IN ('.$str.')';
							$paramsArr = array_merge($paramsArr, $param);
				
						}	
					break;
				}
				
			}
			
			$req1 .= 'GROUP BY produit.idproduit LIMIT 4';
			$req = $this->_bdd->prepare($req1);
			$req->execute($paramsArr);
			$srt = $req->fetchAll(PDO::FETCH_CLASS,"Produit");
			return $srt;
		}

		public function getProduitVotreChoixByCategorie($id)
		{
			$req = $this->_bdd->prepare('SELECT produit.* FROM produit JOIN categorie_has_produit
			ON produit.idproduit = categorie_has_produit.produit_idproduit WHERE categorie_has_produit.categorie_idcategorie = :id  GROUP BY produit.idproduit LIMIT 4');
			$req->bindValue(':id',$id, PDO::PARAM_INT);
			$req->execute();
			$srt = $req->fetchAll(PDO::FETCH_CLASS,"Produit");
			return $srt;
		}

		public function getProduitPanier($arrProduits)
		{
			$params = [];
			foreach($arrProduits as $produit){
				array_push($params,$produit->id);
			}
			$str = implode(',', array_fill(0, count($arrProduits), '?'));
			$req1 = 'SELECT * FROM produit WHERE produit.idproduit IN ('.$str.')';
			$req = $this->_bdd->prepare($req1);
			
			$req->execute($params);
			
			$srt = $req->fetchAll(PDO::FETCH_CLASS,"Produit");
			return $srt;
		}
	}

  