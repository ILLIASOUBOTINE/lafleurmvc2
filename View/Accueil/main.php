<?php
    include 'components/nav_seconde.php';
    // include 'components/populaire.php';
   
    // getViewListCarte($titreSectionNosOffre,$offreProduits);
    
?>

<div class="block_carte">
    <?php
        getViewListCarte($titreSectionPopulaire,$populaireProduits);
    ?>

</div>

<div class="block_carte">
    <?php
        getViewListCarte($titreSectionNosOffre,$offreProduits);
    ?>
    <a href="getPlusProduitOffre">
        <button id="produitOffre" class="btn_grand pd24w600" title="Montre plus">Montre
            plus
        </button>
    </a>
</div>