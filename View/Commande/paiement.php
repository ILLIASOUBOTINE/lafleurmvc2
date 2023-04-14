<h1 class="pd40w700 marg20top titre_commande_etape">Paiement</h1>

<section class="section_commande_etape">
    <?php include 'components/etape_commande.php'?>
</section>
<a href="./etapeRecapitulatif" class="btn_grand pd24w600">retour</a>
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
<section class="section_account_identification">
    <?php include 'components/form_paiement.php'?>
</section>