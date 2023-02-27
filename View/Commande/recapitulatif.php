<h1 class="pd40w700 marg20top titre_commande_etape">Récapitulatif</h1>

<section class="section_commande_etape">
    <?php include 'components/etape_commande.php'?>
</section>
<section class="section_commande_identification">
    <div class="commande_block_panier">
        <?php include 'components/panier.php'?>
    </div>
    <div class="commande_block_form">
        <a href="/etapeLivraison" class="btn_grand pd24w600">retour</a>
        <?php if (isset($_SESSION['livraison'])) {
            var_dump($_SESSION['livraison']);
            var_dump($_SESSION['panier']);
        }?>
    </div>
</section>