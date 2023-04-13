<?php
	class CadeauController extends BaseController
	{
		public function __construct($httpRequest)
		{
			parent::__construct($httpRequest);
            $this->addParam('title','Commande');
		}
        
		public function show(){
			
			$to = "soubotineillia@gmail.com";
			$subject = "тестовый заголовок письма";
			$message = "тестовый текст сообщения";
			$from = "semenuk1991311@gmail.com";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= "From: <".$from.">\r\n";

			if (mail($to,$subject,$message,$headers)) {
				echo "OK";
				exit();
			}
			else {
				echo "ERROR";
				exit();
			}

			// $this->addParam('title','Commande');
			$filename = 'show' ;
			return $this->view($filename);
		}	



}