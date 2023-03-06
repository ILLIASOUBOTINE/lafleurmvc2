<?php

class Commande
{
    private $idcommandes;
    private $date_create;
    private $client_idclient;
    private $num_commande;
    private $livraison_idlivraison;
    private $frais_livraison;

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
        return $obj;
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
    public function setDateCreate($date_create): self
    {
        $this->date_create = $date_create;

        return $this;
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
    public function setClientIdclient($client_idclient): self
    {
        $this->client_idclient = $client_idclient;

        return $this;
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
    public function setNumCommande($num_commande): self
    {
        $this->num_commande = $num_commande;

        return $this;
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
    public function setLivraisonIdlivraison($livraison_idlivraison): self
    {
        $this->livraison_idlivraison = $livraison_idlivraison;

        return $this;
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
    public function setFraisLivraison($frais_livraison): self
    {
        $this->frais_livraison = $frais_livraison;

        return $this;
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
    public function setProduits($produits): self
    {
        $this->produits = $produits;

        return $this;
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
    public function setLivraison($livraison): self
    {
        $this->livraison = $livraison;

        return $this;
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
    public function setClient($client): self
    {
        $this->client = $client;

        return $this;
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
    public function setPrixTotaleProduits($prixTotaleProduits): self
    {
        $this->prixTotaleProduits = $prixTotaleProduits;

        return $this;
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
    public function setPrixPayer($prixPayer): self
    {
        $this->prixPayer = $prixPayer;

        return $this;
    }
}