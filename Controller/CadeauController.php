<?php
class CadeauController extends BaseController
{
	public function __construct($httpRequest)
	{
		parent::__construct($httpRequest);
        $this->addParam('title','Commande');
	}
        
	public function show(){
		if(isset($_SESSION['essaiCadeau'])) {
			$this->redirect('./index');
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
			$filename = 'show';
			return $this->view($filename);
		}
		
	}	

	public function setCadeau(){
		if(isset($_SESSION['essaiCadeau']) ) {
			$this->redirect('./index');
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
					$_SESSION['essaiCadeau'] = true;
					
					echo json_encode(['success' => $idCadeau]);
				}
			}
		}
	}

	public function setEssaiCadeau(){
		header("Content-Type:application/json; charset=utf-8");
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Headers: *');
		$_SESSION['essaiCadeau'] = true;
		echo json_encode(['success' => "true"]);
	}

}