<div class="details_produit">

    <h1 class="pd40w700"><?=$produit->getNom()?></h1>
    <ul class="list_details">
        <li class="pd24w600 marg5bot">Disponible: <span class="int20w400"><?=$produit->getQuantiteTotale()?>
                piece</span>
        </li>
        <li class="pd24w600 marg5bot">Couleur: </li>
        <li class="pd24w600 marg5bot">Longueur: <span class="int20w400"><?=$produit->getLongueur()?>cm</span> </li>
        <li class="pd24w600">Prix: <span class="int20w400"><?=$produit->getPrixUnite()?>$</span></li>
    </ul>
    <p class="description_details int20w400"><?=$produit->getDescription()?></p>

    <button class="btn_grand pd24w600" title="Ajouter">Ajouter</button>

</div>