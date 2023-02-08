<?php

 function getViewListCarte($title,$listProduits){
  $str1 = '<section class="populaire_section">
    <h2 class="pd40w700 marg20top">'.
        $title.'
    </h2>
    <div class="populaire_carte">';

        $str2 = '';
        foreach($listProduits as $produit){

        $str2 .= '<div class="carte marg5 marg20top">
            <a href="details?id='.$produit->getIdproduit().'"><img class="img_carte"
                    src="public/imgs/fleurs/'.$produit->getPhotos()[0]->getImgUrl().'" title=" details"></a>
            <p class="title_carte pd24w600">'.$produit->getNom().'</p>
            <div class="footer_carte">
                <span class="prix_carte int20w400">'.$produit->getPrixUnite().'</span>
                <button class="btn_ajouter int20w400">'.$produit->getDisponible().'</button>
            </div>
        </div>';

        }

        $str3 = '</div>
  </section>';

    echo $str1.$str2.$str3;
}