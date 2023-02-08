<?php
 class ListsCarte {
    private string $title;
    private  $listProduits;
    
    public function __construct($title,$listProduits)
    {
        $this->title = $title;
        $this->listProduits = $listProduits;
        
    }

    

    /**
     * Get the value of title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function getListProduits()
    {
        return $this->getListProduits();
    }

    public function getViewListCarte()
    {
        
        // return include 'components/listCarte.php';
       $str1 = '<section class="populaire_section">
        <h2 class="pd40w700 marg20top">'.
        $this->getTitle().'
        </h2>
        <div class="populaire_carte">'; 
        
        $str2 = '';
    foreach($this->getListProduits() as $produit){
        
       $str2 .= '<div class="carte marg5">
            <a href="details?id='.$produit->getIdproduit().'"><img class="img_carte"
            src="public/imgs/fleurs/'.$produit->getPhotos()[0]->getImgUrl().'" title=" details"></a>
        <p class="title_carte pd24w600">'.$produit->getNom().'</p>
        <div class="footer_carte">
            <span class="prix_carte int20w400">'.$produit->getPrixUnite().'</span>
        <button class="btn_ajouter int20w400">'.$produit->getDisponible().'</button>
        </div>
        </div>';

    }

    $str3 = '</div> </section>';

    echo $str1.$str2.$str3;
}
}