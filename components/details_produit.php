<div class="details_produit">

    <h1 class="pd40w700"><?=$produit->getNom()?></h1>
    <ul class="list_details">
        <li class="pd24w600 marg5bot">Disponible:
            <span class="int20w400">
                <?=$produit->getQuantiteTotale()?>piece
            </span>
        </li>

        <?php  if(count($produit->getFleures()) == 1):?>
        <li class="pd24w600 marg5bot">Couleur:
            <span class="int20w400">
                <?=$produit->getFleures()[0]->getCouleur()->getNom()?>
            </span>
        </li>
        <?php endif?>

        <?php if($produit->getLongueur() !== null):?>
        <li class="pd24w600 marg5bot">Longueur: <span class="int20w400"><?=$produit->getLongueur()?>cm</span> </li>
        <?php endif?>

        <?php if(count($produit->getFleures()) == 1):?>
        <li class="pd24w600 marg5bot">Quantite:
            <span class="int20w400">
                <?php echo $produit->getFleures()[0]->quantite . $produit->getUnite()?>
            </span>
        </li>
        <?php endif?>

        <?php if(count($produit->getFleures()) > 1):?>
        <li class="pd24w600 marg5bot">Composition:
            <?php  foreach($produit->getFleures() as $fleur):?>
            <ul class="marg20 bordligne  marg5bot">
                <li class="pd20w400 marg5bot">Nom:
                    <span class="int20w400">
                        <?=$fleur->getEspeceFleur()->getNom()?>
                    </span>
                </li>
                <li class="pd20w400 marg5bot">Couleur:
                    <span class="int20w400">
                        <?=$fleur->getCouleur()->getNom()?>
                    </span>
                </li>
                <li class="pd20w400 marg5bot">Quantite:
                    <span class="int20w400">
                        <?php echo $fleur->quantite . $fleur->getUnite()->getNom()?>
                    </span>
                </li>
            </ul>
            <?php endforeach?>
        </li>

        <?php endif?>
        <li class="pd24w600">Prix: <span class="int20w400"><?=$produit->getPrixUnite()?>$</span></li>
    </ul>
    <p class="description_details int20w400"><?=$produit->getDescription()?></p>


    <button class="btn_ajouter btn_grand pd24w600" id="idBtnAjouter<?=$produit->getIdproduit()?>"
        title="<?=$produit->getDisponible()?>"
        data-message="{&quot;imgProduit&quot;:&quot;public/imgs/fleurs/<?=$produit->getPhotos()[0]->getImgUrl()?>&quot;,
        &quot;nomProduit&quot;:&quot;<?=$produit->getNom() ?>&quot;,&quot;prixProduit&quot;:<?=$produit->getPrixUnite()?>}"><?=$produit->getDisponible()?></button>

</div>