<h1 class="pd40w700 marg20top titre_account">Mes commandes</h1>
<a href="./logOut" class="btn_grand pd24w600">Logout</a>

<?php if($commandes == null):?>
<h1 class="pd40w700 marg20top titre_account">Votre historique de commandes est vide</h1>
<?php else:?>
<?php foreach($commandes as $commande):?>
<section class="section_commande_recapupitulatif">

    <div class="commande_block_info">
        <div class="div_commande">
            <p class="pd24w600">Numéro de commande:</p>
            <p class="int20w400">
                <?=$commande->getIdcommandes()?>
            </p>
        </div>
        <div class="div_commande">
            <p class="pd24w600">Votre email:</p>
            <p class="int20w400">
                <?=$commande->getClient()->getEmail()?>
            </p>
        </div>
        <div class="div_commande">
            <p class="pd24w600">Numéro de téléphone:</p>
            <p class="int20w400">
                <?=$commande->getLivraison()->getNumTelephone()?>
            </p>
        </div>
        <div class="div_commande">
            <p class="pd24w600">Date de livraison:</p>
            <p class="int20w400">
                <?=$commande->getLivraison()->getDatePrevu()?>
            </p>
        </div>
        <div class="div_commande_adresse">
            <div class="div_commande">
                <p class="pd24w600">Adresse de livraison:</p>
            </div>
            <div class="div_commande marg20">
                <p class="pd20w400"> ville:</p>
                <p class="int20w400">
                    <?=$commande->getLivraison()->getVille()->getNomVille()?>
                </p>
            </div>
            <div class="div_commande marg20">
                <p class="pd20w400"> rue:</p>
                <p class="int20w400">
                    <?=$commande->getLivraison()->getRue()?>
                </p>
            </div>
            <div class="div_commande marg20">
                <p class="pd20w400"> numéro de maison: </p>
                <p class="int20w400">
                    <?=$commande->getLivraison()->getNumMaison()?>
                </p>
            </div>
            <div class="div_commande marg20">
                <p class="pd20w400"> numéro d'appartement:</p>
                <p class="int20w400">
                    <?=$commande->getLivraison()->getNumAppart()?>
                </p>
            </div>
        </div>



    </div>
    <div class="commande_block_produits">
        <p class="pd24w600">Votre Panier:</p>

        <?php foreach($commande->getProduits() as $produit):?>
        <?php include 'components/produit_commande.php'?>
        <?php endforeach?>

        <div class="div_commande">
            <p class="pd24w600"> Total:</p>
            <p class="int20w400">
                <?=$commande->getPrixTotaleProduits()?>$
            </p>
        </div>
        <div class="div_commande">
            <p class="pd24w600"> frais de livraison:</p>
            <p class="int20w400">
                <?=$commande->getFraisLivraison()?>$
            </p>
        </div>
        <div class="div_commande">
            <p class="pd24w600"> le montant payé: </p>
            <p class="int20w400">
                <?=$commande->getPrixPayer()?>$
            </p>
        </div>



    </div>

</section>
<?php endforeach?>
<?php endif ?>