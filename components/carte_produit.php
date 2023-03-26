<div class="carte marg5 marg20top">
    <a href="details?id=<?=$produit->getIdproduit()?>">
        <img class="img_carte" src="public/imgs/fleurs/<?=$produit->getPhotos()[0]->getImgUrl()?>" title=" details">
    </a>
    <p class="title_carte pd24w600">
        <?=$produit->getNom()?>
    </p>
    <div class="footer_carte">
        <span class="prix_carte int20w400"><?=$produit->getPrixUnite()?></span>
        <button class="btn_ajouter int20w400" id="idBtnAjouter<?=$produit->getIdproduit()?>"
            data-message="{&quot;imgProduit&quot;:&quot;public/imgs/fleurs/<?=$produit->getPhotos()[0]->getImgUrl()?>&quot;,
        &quot;nomProduit&quot;:&quot;<?=$produit->getNom() ?>&quot;,&quot;prixProduit&quot;:<?=$produit->getPrixUnite()?>}">
            <?=$produit->getDisponible()?>
        </button>
    </div>
</div>