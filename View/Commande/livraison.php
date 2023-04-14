<h1 class="pd40w700 marg20top titre_commande_etape">Livraison</h1>

<section class="section_commande_etape">
    <?php include 'components/etape_commande.php'?>
</section>
<section class="section_commande_identification">
    <div class="commande_block_panier">
        <?php if (isset($messageError)): ?>
        <div style="margin-bottom: 20px; background-color: red; width: 90%">
            <?php foreach($messageError as $message):?>
            <p class="pd24w600  titre_account">

                <?=$message?>
            </p>
            <?php endforeach ?>
        </div>
        <?php endif ?>
        <?php include 'components/panier.php'?>
    </div>
    <div class="commande_block_form">
        <a href="./etapeIdentificationLogout" class="btn_grand pd24w600">retour</a>
        <?php include 'components/form_livraison.php'?>
    </div>
</section>