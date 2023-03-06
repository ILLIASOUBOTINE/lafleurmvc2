<?php

class Commande
{
    private $idcommandes;
    private $date_create;
    private $client_idclient;
    private $num_commande;
    private $livraison_idlivraison;
    private $frais_livraison = 3.99;

    private $produits;
    private $livraison;
    private $client;

    private $prixTotaleProduits;
    private $prixPayer;

    public function __construct()
    {
        
    }

    public static function createCommandeConstruct($produits,$livraison,$client){
        $obj = new Commande();
        $obj->setProduits($produits); 
        $obj->setLivraison($livraison); 
        $obj->setClient($client); 
        $obj->setClientIdclient(intval($obj->getClient()->getIdClient())); 
        $obj->setPrixTotaleProduits($obj->calculPrixTotaleProduits($produits));
        $obj->setPrixPayer($obj->calculFraisLivraison($obj->getPrixTotaleProduits(),50));
        $obj->setPrixPayer(number_format($obj->getPrixTotaleProduits()+$obj->getFraisLivraison(),2));
        return $obj;
    }

    public function calculPrixTotaleProduits($produits) {
        $prix = 0;
        foreach($produits as $produit){
            $prix += $produit->getPrixPanier();
        }
        return number_format($prix,2);
    }
    
    public function calculFraisLivraison($prixTotaleProduits,$prixLimit) {
        $prix = 0;
        if($prixTotaleProduits <= $prixLimit){
            $prix = $this->getFraisLivraison();
        }
        $this->setFraisLivraison($prix);
        return $prix;
    }

    /**
     * Get the value of idcommandes
     */
    public function getIdcommandes()
    {
        return $this->idcommandes;
    }

    /**
     * Get the value of date_create
     */
    public function getDateCreate()
    {
        return $this->date_create;
    }

    /**
     * Set the value of date_create
     */
    public function setDateCreate($date_create)
    {
        $this->date_create = $date_create;

        
    }

    /**
     * Get the value of client_idclient
     */
    public function getClientIdclient()
    {
        return $this->client_idclient;
    }

    /**
     * Set the value of client_idclient
     */
    public function setClientIdclient($client_idclient)
    {
        $this->client_idclient = $client_idclient;

       
    }

    /**
     * Get the value of num_commande
     */
    public function getNumCommande()
    {
        return $this->num_commande;
    }

    /**
     * Set the value of num_commande
     */
    public function setNumCommande($num_commande)
    {
        $this->num_commande = $num_commande;

        
    }

    /**
     * Get the value of livraison_idlivraison
     */
    public function getLivraisonIdlivraison()
    {
        return $this->livraison_idlivraison;
    }

    /**
     * Set the value of livraison_idlivraison
     */
    public function setLivraisonIdlivraison($livraison_idlivraison)
    {
        $this->livraison_idlivraison = $livraison_idlivraison;

        
    }

    /**
     * Get the value of frais_livraison
     */
    public function getFraisLivraison()
    {
        return $this->frais_livraison;
    }

    /**
     * Set the value of frais_livraison
     */
    public function setFraisLivraison($frais_livraison)
    {
        $this->frais_livraison = $frais_livraison;

        
    }

    /**
     * Get the value of produits
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * Set the value of produits
     */
    public function setProduits($produits)
    {
        $this->produits = $produits;

       
    }

    /**
     * Get the value of livraison
     */
    public function getLivraison()
    {
        return $this->livraison;
    }

    /**
     * Set the value of livraison
     */
    public function setLivraison($livraison)
    {
        $this->livraison = $livraison;

    }

    /**
     * Get the value of client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set the value of client
     */
    public function setClient($client)
    {
        $this->client = $client;

        
    }

    /**
     * Get the value of prixTotaleProduits
     */
    public function getPrixTotaleProduits()
    {
        return $this->prixTotaleProduits;
    }

    /**
     * Set the value of prixTotaleProduits
     */
    public function setPrixTotaleProduits($prixTotaleProduits)
    {
        $this->prixTotaleProduits = $prixTotaleProduits;

        
    }

    /**
     * Get the value of prixPayer
     */
    public function getPrixPayer()
    {
        return $this->prixPayer;
    }

    /**
     * Set the value of prixPayer
     */
    public function setPrixPayer($prixPayer)
    {
        $this->prixPayer = $prixPayer;

        
    }
}