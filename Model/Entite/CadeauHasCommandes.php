<?php

class CadeauHasCommandes {
    private $commandes_idcommandes;
    private $cadeau_idcadeau;

    public static function createCommandeHasCadeauInBD($idCadeau,$idCommande){
        
        
            $cadeau_idcadeau = $idCadeau;
            $commandes_idcommandes = $idCommande;
            
            $newobjM = new CadeauHasCommandesManager();
            $params = ['cadeau_idcadeau','commandes_idcommandes'];
            $values = [$cadeau_idcadeau,$commandes_idcommandes];
            $reponse = $newobjM->create($params,$values);
           
       
        
        return ($reponse);
    }

    

    /**
     * Get the value of commandes_idcommandes
     */
    public function getCommandesIdcommandes()
    {
        return $this->commandes_idcommandes;
    }

    /**
     * Set the value of commandes_idcommandes
     */
    public function setCommandesIdcommandes($commandes_idcommandes): self
    {
        $this->commandes_idcommandes = $commandes_idcommandes;

        return $this;
    }

    /**
     * Get the value of cadeau_idcadeau
     */
    public function getCadeauIdcadeau()
    {
        return $this->cadeau_idcadeau;
    }

    /**
     * Set the value of cadeau_idcadeau
     */
    public function setCadeauIdcadeau($cadeau_idcadeau): self
    {
        $this->cadeau_idcadeau = $cadeau_idcadeau;

        return $this;
    }
}