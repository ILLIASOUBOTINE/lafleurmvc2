<h1 class="pd40w700 marg20top titre_commande_etape">Identification</h1>

<section class="section_commande_etape">
    <?php include 'components/etape_commande.php'?>
</section>
<section class="section_commande_identification">
    <div class="commande_block_panier">
        <?php include 'components/panier.php'?>
    </div>
    <div class="commande_block_form">
        <?php if (isset($messageError)): ?>
        <h1 class="pd40w700 marg20top titre_account">
            <?=$messageError?>
        </h1>
        <?php endif ?>
        <?php if (isset($messageSucces)): ?>
        <h1 class="pd40w700 marg20top titre_account">
            <?=$messageSucces?>
        </h1>
        <?php endif ?>

        <a href="./etapeIdentification" class="btn_grand pd24w600">retour</a>
        <?php include 'components/form_connexion_commande.php'?>

    </div>
</section>