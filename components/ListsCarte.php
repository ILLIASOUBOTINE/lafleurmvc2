<?php
class ListsCarte {
    
    public static function getViewListCarte($title,$listProduits){
       echo '<section class="populaire_section">
           <h2 class="pd40w700 marg20top">'.
              $title.'
            </h2>
         <div class="populaire_carte">';
         
        
        foreach($listProduits as $produit){
            include 'carte_produit.php';
        }

        echo '</div>
        </section>';
    }
}