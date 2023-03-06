<h1 class="pd40w700 marg20top titre_commande_etape">Récapitulatif</h1>

<section class="section_commande_etape">
    <?php include 'components/etape_commande.php'?>
</section>
<a href="/etapeLivraison" class="btn_grand pd24w600">retour</a>
<section class="section_commande_recapupitulatif">

    <div class="commande_block_info">
        <div class="div_commande">
            <p class="pd24w600">Votre email:</p>
            <p class="int20w400">
                <?=$client->getEmail()?>
            </p>
        </div>
        <div class="div_commande">
            <p class="pd24w600">Numéro de téléphone:</p>
            <p class="int20w400">
                <?=$livraison->getNumTelephone()?>
            </p>
        </div>
        <div class="div_commande">
            <p class="pd24w600">Date de livraison:</p>
            <p class="int20w400">
                <?=$livraison->getDatePrevu()?>
            </p>
        </div>
        <div class="div_commande_adresse">
            <div class="div_commande">
                <p class="pd24w600">Adresse de livraison:</p>
            </div>
            <div class="div_commande marg20">
                <p class="pd20w400"> ville:</p>
                <p class="int20w400">
                    <?=$livraison->getVille()->getNomVille()?>
                </p>
            </div>
            <div class="div_commande marg20">
                <p class="pd20w400"> rue:</p>
                <p class="int20w400">
                    <?=$livraison->getRue()?>
                </p>
            </div>
            <div class="div_commande marg20">
                <p class="pd20w400"> numéro de maison: </p>
                <p class="int20w400">
                    <?=$livraison->getNumMaison()?>
                </p>
            </div>
            <div class="div_commande marg20">
                <p class="pd20w400"> numéro d'appartement:</p>
                <p class="int20w400">
                    <?=$livraison->getNumAppart()?>
                </p>
            </div>
        </div>



    </div>
    <div class="commande_block_produits">

        <?php if (isset($_SESSION['livraison'])) {
           
            var_dump($_SESSION['panier']);
            var_dump($commande);
            
        }?>

    </div>

</section>
<a href="/etapePaiement" class="btn_grand pd24w600">Valider</a>