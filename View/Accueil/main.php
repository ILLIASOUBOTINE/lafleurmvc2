<?php
     include 'components/nav_seconde.php';
    // include 'components/populaire.php';
   
    // getViewListCarte($titreSectionNosOffre,$offreProduits);
    
?>
<?php if(isset($banniere)):?>
<div class="banniere">
    <img class="img_banniere" src="public/imgs/fleurs/<?=$banniere->getPhoto()->getImgUrl()?>" alt="">
    <div class="text_banniere marg20top">
        <h1 class="titre_banniere pd64w700">
            <?=$banniere->getTitre()?>
        </h1>
        <p class="description_banniere pd40w700b"> <?=$banniere->getDescription()?></p>
    </div>
    <a class="btn_grand pd24w600" href="./getProduitVotreChoixByEvent?idevent=<?=$banniere->getIdbanniereEvent()?>"
        title="Voir la offre">Voir l'offre
    </a>
</div>
<?php endif?>

<?php if(isset($votreChoixProduits)):?>
<div class="block_carte">
    <?php
       ListsCarte::getViewListCarte($titreSectionVotreChoix,$votreChoixProduits);
    ?>
    <?php if(empty($votreChoixProduits)):?>
    <p class="pd24w600">Rien n'a été trouvé selon votre requête, modifiez les paramètres de la requête.</p>
    <?php endif?>
</div>
<?php endif?>

<div class="block_carte">
    <?php
        ListsCarte::getViewListCarte($titreSectionPopulaire,$populaireProduits);
    ?>

</div>

<div id="blockProduitOffre" class="block_carte">
    <?php
        ListsCarte::getViewListCarte($titreSectionNosOffre,$offreProduits);
    ?>
    <!-- <a href="./getPlusProduitOffre"> -->
    <button id="produitOffre" class="btn_grand pd24w600" title="Montre plus">Montre
        plus
    </button>
    <!-- </a> -->
</div>