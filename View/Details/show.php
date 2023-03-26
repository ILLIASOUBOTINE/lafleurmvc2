<section class="details">
    <?php include 'components/carrousel.php'?>
    <?php include 'components/details_produit.php'?>


</section>
<div class="block_carte">
    <?php
        ListsCarte::getViewListCarte($titreSectionPopulaire,$populaireProduits);
    ?>

</div>