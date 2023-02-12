<div class="notrelivraison" id="notrelivraison">
    <div id="livraisonVilleFermer" class="pd24w600 itemdrop">
        <span>Notre livraison</span>
        <img src="public/imgs/general/close_circle_icon.svg" alt="">
    </div>
    <div class="itemdrop style_item_list">
        <input id="inputSearchVille" type="text" class="search_ville int20w400" placeholder="Ville" />
        <img class="search_icon" src="public/imgs/general/search_icon.svg" alt="" />
    </div>
    <?php foreach($_SESSION['villes'] as $ville):?>
    <p class="item_ville int20w400">
        <?=$ville->getNomVille()?>
    </p>
    <?php endforeach?>
</div>