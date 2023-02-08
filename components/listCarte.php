<section class="populaire_section ">
    <h2 class="pd40w700 marg20top">
        <?=$this->getTitle()?>
    </h2>
    <div class="populaire_carte ">
        <?php foreach($this->getListProduits() as $produit):?>
        <div class="carte marg20top">
            <a href="details?id=<?=$produit->getIdproduit()?>"><img class="img_carte"
                    src="public/imgs/fleurs/<?=$produit->getPhotos()[0]->getImgUrl()?>" title=" details"></a>
            <p class="title_carte pd24w600"><?=$produit->getNom()?></p>
            <div class="footer_carte">
                <span class="prix_carte int20w400"><?=$produit->getPrixUnite()?></span>
                <button class="btn_ajouter int20w400"><?=$produit->getDisponible()?></button>
            </div>
        </div>

        <?php endforeach?>
    </div>
</section>