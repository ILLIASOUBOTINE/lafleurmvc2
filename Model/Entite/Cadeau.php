<?php

class Cadeau {
    
    private $idcadeau;
    private $nom;
    private $quantite;
    private $photo_idphoto;
    
    private $photo;

    public function __construct()
    {
        $photoM = new PhotoManager();
        $this->photo = $photoM->getById($this->photo_idphoto)->getImgUrl();
    }
    
    

    /**
     * Get the value of idcadeau
     */
    public function getIdcadeau()
    {
        return $this->idcadeau;
    }

    /**
     * Set the value of idcadeau
     */
    public function setIdcadeau($idcadeau): self
    {
        $this->idcadeau = $idcadeau;

        return $this;
    }

    /**
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

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

    /**
     * Get the value of photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     */
    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of photo_idphoto
     */
    public function getPhotoIdphoto()
    {
        return $this->photo_idphoto;
    }

    /**
     * Set the value of photo_idphoto
     */
    public function setPhotoIdphoto($photo_idphoto): self
    {
        $this->photo_idphoto = $photo_idphoto;

        return $this;
    }


    public function modifQuantite(){
        $cadeauM = new CadeauManager();
        $id = intval($this->getIdcadeau());
        $param = ["quantite"];

        $quantite = intval($this->getQuantite() - 1);
        
        $values = [$quantite];
        $cadeauM->update($id,$param,$values);
        
    }
}