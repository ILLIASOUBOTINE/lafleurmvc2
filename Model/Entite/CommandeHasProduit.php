<?php

class CommandeHasProduit
{
    private $produit_idproduit;
    private $commandes_idcommandes;
    private $quantite;
 

    public function __construct()
    {
        
    }

    public static function createCommandeHasProduitInBD($commande,$idCommande){
        
        foreach($commande->getProduits() as $produit){
            $produit_idproduit = intval($produit->getIdproduit());
            $commandes_idcommandes = $idCommande;
            $quantite = $produit->getQuantitePanier();
            $newobjM = new CommandeHasProduitManager();
            $params = ['produit_idproduit','commandes_idcommandes','quantite'];
            $values = [$produit_idproduit,$commandes_idcommandes,$quantite];
            $reponse = $newobjM->create($params,$values);
           
        }
        
        return ($reponse);
    }

    

    /**
     * Get the value of produit_idproduit
     */
    public function getProduitIdproduit()
    {
        return $this->produit_idproduit;
    }

    /**
     * Set the value of produit_idproduit
     */
    public function setProduitIdproduit($produit_idproduit): self
    {
        $this->produit_idproduit = $produit_idproduit;

        return $this;
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
     * Get the value of quantite
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set the value of quantite
     */
    public function setQuantite($quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }
}