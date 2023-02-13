<?php
    include 'components/nav_seconde.php';
    // include 'components/populaire.php';
   
    // getViewListCarte($titreSectionNosOffre,$offreProduits);
    
?>
<?php if(isset($votreChoixProduits)):?>
<div class="block_carte">

    <?php
        getViewListCarte($titreSectionVotreChoix,$votreChoixProduits);
    ?>
    <?php if(empty($votreChoixProduits)):?>
    <p class="pd24w600">Rien n'a été trouvé selon votre requête, modifiez les paramètres de la requête.</p>
    <?php endif?>
</div>
<?php endif?>

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