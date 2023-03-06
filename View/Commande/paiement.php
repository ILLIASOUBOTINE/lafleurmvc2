<h1 class="pd40w700 marg20top titre_commande_etape">Paiement</h1>

<section class="section_commande_etape">
    <?php include 'components/etape_commande.php'?>
</section>
<a href="/etapeRecapitulatif" class="btn_grand pd24w600">retour</a>
<section class="section_commande_recapupitulatif">






    <div class="commande_block_produits">


        <?php if (isset($_SESSION['livraison'])) {
           
            // var_dump($_SESSION['panier']);
            var_dump($_SESSION['commande']);
            
        }?>

    </div>

</section>
<a href="/controlPaiement" class="btn_grand pd24w600">Valider</a>