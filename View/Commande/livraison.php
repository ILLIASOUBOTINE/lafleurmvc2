<h1 class="pd40w700 marg20top titre_commande_etape">Livraison</h1>

<section class="section_commande_etape">
    <?php include 'components/etape_commande.php'?>
</section>
<section class="section_commande_identification">
    <div class="commande_block_panier">
        <?php if (isset($messageError)): ?>
        <div class="message_error_block">
            <?php foreach($messageError as $message):?>
            <p class="pd24w600 message_error titre_account">

                <?=$message?>
            </p>
            <?php endforeach ?>
        </div>
        <?php endif ?>
        <?php include 'components/panier.php'?>
    </div>
    <div class="commande_block_form">
        <a href="/etapeIdentificationLogout" class="btn_grand pd24w600">retour</a>
        <?php if (isset($arrErrorsLivraison)): ?>
        <div class="message_error_block">
            <?php foreach($arrErrorsLivraison as $message):?>
            <p class="pd24w600 message_error titre_account">

                <?=$message?>
            </p>
            <?php endforeach ?>
        </div>
        <?php endif ?>
        <?php include 'components/form_livraison.php'?>
    </div>
</section>