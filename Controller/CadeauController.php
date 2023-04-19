<?php
	class CadeauController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
            $this->addParam('title','Commande');
		}
        
		// public function show(){
			
		// 	$to = "soubotineillia@gmail.com";
		// 	$subject = "тестовый заголовок письма";
		// 	$message = "тестовый текст сообщения";
		// 	$from = "semenuk1991311@gmail.com";
		// 	$headers  = 'MIME-Version: 1.0' . "\r\n";
		// 	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		// 	$headers .= "From: <".$from.">\r\n";

		// 	if (mail($to,$subject,$message,$headers)) {
		// 		echo "OK";
		// 		exit();
		// 	}
		// 	else {
		// 		echo "ERROR";
		// 		exit();
		// 	}

		// 	// $this->addParam('title','Commande');
		// 	$filename = 'show' ;
		// 	return $this->view($filename);
		// }	

		public function show(){
			if(isset($_SESSION['essaiCadeau'])) {
				$this->redirect('/');
			} else {
				
			
			
				$cadeauM = new CadeauManager();
				$cadeaux = $cadeauM->getAll();

				$cadeauxArr = array();
				foreach ($cadeaux as $cadeau) {
					$cadeauArr = array(
						'idcadeau' => $cadeau->getIdcadeau(),
						'nom' => $cadeau->getNom(),
						'quantite' => $cadeau->getQuantite(),
						'photo_idphoto' => $cadeau->getPhotoIdphoto(),
						'photo' => $cadeau->getPhoto()
					);
					array_push($cadeauxArr, $cadeauArr);
				}
				
				
				$jsonCadeaux = json_encode($cadeauxArr);
				$this->addParam('jsonCadeaux',$jsonCadeaux);
				// var_dump($cadeaux);
				// echo $jsonCadeaux;

				
				$filename = 'show';
				return $this->view($filename);
			}
			
		}	

		public function setCadeau(){

			
			
			if(isset($_SESSION['essaiCadeau']) ) {
				$this->redirect('/');
			} else {

				header("Content-Type:application/json; charset=utf-8");
				header('Access-Control-Allow-Origin: *');
				header('Access-Control-Allow-Headers: *');
				
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					$input = file_get_contents('php://input');
					$data = json_decode($input, true);
					if (isset($data['idCadeau'])) {
						$idCadeau = $data['idCadeau'];
						$idCommande = $_SESSION['idcommande'];
						
						CadeauHasCommandes::createCommandeHasCadeauInBD($idCadeau,$idCommande);
						
						$cadeauM = new CadeauManager();
						$cadeau = $cadeauM->getById($idCadeau);
						$cadeau->modifQuantite();
						
						// var_dump($commande);
						// exit;
						// $commande->modifQuantiteProduitTotalDansBD();
						$_SESSION['essaiCadeau'] = true;
						// $this->redirect('/monAccount');
						echo json_encode(['success' => $idCadeau]);
					}
				}
			}
		}


		// public function setCadeau(){
		// 	if(isset($_SESSION['essaiCadeau']) && $_SESSION['essaiCadeau']) {
		// 		$this->redirect('/');
		// 	} else {
		// 		$idCommande = $_SESSION['idcommande'];
		// 		$idCadeau = $this->get_httpRequest()->getParam()['idCadeau']; 
		// 		CadeauHasCommandes::createCommandeHasCadeauInBD($idCadeau,$idCommande);
				
		// 		$cadeauM = new CadeauManager();
		// 		$cadeau = $cadeauM->getById($idCadeau);
		// 		$cadeau->modifQuantite();
				
		// 		// var_dump($commande);
		// 		// exit;
		// 		// $commande->modifQuantiteProduitTotalDansBD();
		// 		$_SESSION['essaiCadeau'] = true;
		// 		$this->redirect('/monAccount');
		// 	}
		// }

		public function setEssaiCadeau(){

			header("Content-Type:application/json; charset=utf-8");
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Headers: *');
			
			// Установка значения сессии
			
				$_SESSION['essaiCadeau'] = true;
		
			
			//Установка заголовков ответа
			
		
			// Возвращение JSON-ответа
			
			
			echo json_encode(['success' => "true"]);
		
			 
		}

	

}