<form action="getProduitVotreChoix" method="POST" class="itemdrop_menu listFiltre">
    <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token']?>">
    <div class="itemdrop_menu dnone itemFiltre" id="itemFiltre">
        <div class="filtre_prix itemdrop_menu">
            <div id="filtrePrix" class="pd24w600 itemdrop1">
                <span>Prix</span>
                <img src="public/imgs/general/icons_triangle-down.svg" alt="">
            </div>
            <div class="itemPrix dnone" id="itemPrix">
                <input type="range" id="prix" name="prix" value="150" step="1" max="150" min="0">
                <span class="prix_affiche int20w400">150</span>
                <span class="int20w400">$</span>

            </div>
        </div>
        <!-- Fleur -->
        <div class="filtre_fleur itemdrop_menu">
            <div id="filtreFleur" class="pd24w600 itemdrop1">
                <span>Fleur</span>
                <img src="public/imgs/general/icons_triangle-down.svg" alt="">
            </div>
            <div class="itemdrop_menu dnone" id="itemFleur">

                <input type="checkbox" name="fleures[]" value="none" checked hidden>

                <?php foreach($_SESSION['especeFleures'] as $fleur):?>
                <label class=" itemdrop2 int20w400" for="<?='fleur'.$fleur->getIdEspeceFleur()?>">
                    <input type="checkbox" id="<?='fleur'.$fleur->getIdEspeceFleur()?>" name="fleures[]"
                        value="<?=$fleur->getIdEspeceFleur()?>" class="marg20">
                    <?=$fleur->getNom()?>
                </label>
                <?php endforeach?>

            </div>
        </div>
        <!-- Categorie -->
        <div class="filtre_categorie itemdrop_menu">
            <div id="filtreCategorie" class="pd24w600 itemdrop1">
                <span>Categorie</span>
                <img src="public/imgs/general/icons_triangle-down.svg" alt="">
            </div>
            <div class="itemdrop_menu dnone" id="itemCategorie">
                <input type="checkbox" name="categories[]" value="none" checked hidden>
                <?php foreach($_SESSION['categories'] as $categorie):?>
                <label class="itemdrop2 int20w400" for="<?='categorie'.$categorie->getIdcategorie()?>">
                    <input type="checkbox" id="<?='categorie'.$categorie->getIdcategorie()?>" name="categories[]"
                        value="<?=$categorie->getIdcategorie()?>" class=" marg20">
                    <?=$categorie->getNom()?>
                </label>
                <?php endforeach?>

            </div>
        </div>
        <!-- Couleur -->
        <div class="filtre_couleur itemdrop_menu">
            <div id="filtreCouleur" class="pd24w600 itemdrop1">
                <span>Couleur</span>
                <img src="public/imgs/general/icons_triangle-down.svg" alt="">
            </div>
            <div class="itemdrop_menu dnone" id="itemCouleur">
                <input type="checkbox" name="couleures[]" value="none" checked hidden>
                <?php foreach($_SESSION['couleures'] as $couleur):?>
                <label class="itemdrop2 int20w400" for="<?='couleur'.$couleur->getIdcouleur()?>">
                    <input type="checkbox" id="<?='couleur'.$couleur->getIdcouleur()?>" name="couleures[]"
                        value="<?=$couleur->getIdcouleur()?>" class="marg20">
                    <?=$couleur->getNom()?>
                </label>
                <?php endforeach?>
            </div>
        </div>
        <div class="btn_filtre">

            <button type="submit" class="btn_grand pd24w600" title="Trouver">Trouver</button>
        </div>
    </div>



</form>