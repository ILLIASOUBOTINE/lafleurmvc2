<div class="produit_panier_commande marg20top">
    <div class="div_commande">
        <p class="pd20w400">Titre du produit: </p>
        <p class="int20w400">
            <?=$produit->getNom()?>
        </p>
    </div>
    <div class="div_commande">
        <p class="pd20w400">Quantité: </p>
        <p class="int20w400">
            <?=$produit->getQuantitePanier()?>
        </p>
    </div>
    <div class="div_commande">
        <p class="pd20w400">Prix: </p>
        <p class="int20w400">
            <?=$produit->getPrixUnite()?>$
        </p>
    </div>
    <div class="div_commande">
        <p class="pd20w400">Total: </p>
        <p class="int20w400">
            <?=$produit->getPrixPanier()?>$
        </p>
    </div>
</div>