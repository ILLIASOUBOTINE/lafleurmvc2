<nav class="nav_seconde">
    <div class="filtreProduitNavSeconde">
        <div id="filtreProduit" class="pd24w600 itemdrop filtreProduit">
            <span>Filtre produit</span>
            <img src="public/imgs/general/icons_triangle-down.svg" alt="">
        </div>
        <div class="nav_seconde_filtre">
            <?php include 'components/list_filtre.php'?>
        </div>
    </div>

    <nav class="nav_categorie">
        <?php foreach($_SESSION['categories'] as $categorie):?>
        <a class="pd24w600 marg20 cursorscall20"
            href="./getProduitVotreChoixByCategorie?idcategorie=<?=$categorie->getIdcategorie()?>"><?=$categorie->getNom()?></a>
        <?php endforeach?>
    </nav>
</nav>