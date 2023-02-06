<form action="#" method="POST" class="itemdrop_menu listFiltre">
    <!-- <div id="filtreProduit" class="pd24w600 itemdrop ">
        <span>Filtre produit</span>
        <img src="imgs/icons_triangle-down.svg" alt="">
    </div> -->
    <div class="itemdrop_menu dnone itemFiltre" id="itemFiltre">
        <div class="filtre_prix itemdrop_menu">
            <div id="filtrePrix" class="pd24w600 itemdrop1">
                <span>Prix</span>
                <img src="public/imgs/general/icons_triangle-down.svg" alt="">
            </div>
            <div class="itemPrix dnone" id="itemPrix">
                <input type="range" id="prix" value="30" step="1" max="150" min="0">
                <span class="prix_affiche int20w400">30</span>
                <span class="int20w400">$</span>
                </input>
            </div>
        </div>
        <div class="filtre_fleur itemdrop_menu">
            <div id="filtreFleur" class="pd24w600 itemdrop1">
                <span>Fleur</span>
                <img src="public/imgs/general/icons_triangle-down.svg" alt="">
            </div>
            <div class="itemdrop_menu dnone" id="itemFleur">
                <label class="itemdrop2 int20w400" for="fleur">
                    <input type="checkbox" id="fleur" name="fleur" class="marg20">
                    fleur
                </label>
                <label class="itemdrop2 int20w400" for="fleur1">
                    <input type="checkbox" id="fleur1" name="fleur" class="marg20">
                    fleur1
                </label>
            </div>
        </div>
        <div class="filtre_categorie itemdrop_menu">
            <div id="filtreCategorie" class="pd24w600 itemdrop1">
                <span>Categorie</span>
                <img src="public/imgs/general/icons_triangle-down.svg" alt="">
            </div>
            <div class="itemdrop_menu dnone" id="itemCategorie">
                <label class="itemdrop2 int20w400" for="categorie">
                    <input type="checkbox" id="categorie" name="categorie" class="marg20">
                    categorie
                </label>
                <label class="itemdrop2 int20w400" for="categorie1">
                    <input type="checkbox" id="categorie1" name="categorie" class="marg20">
                    categorie1
                </label>
            </div>
        </div>
        <div class="filtre_couleur itemdrop_menu">
            <div id="filtreCouleur" class="pd24w600 itemdrop1">
                <span>Couleur</span>
                <img src="public/imgs/general/icons_triangle-down.svg" alt="">
            </div>
            <div class="itemdrop_menu dnone" id="itemCouleur">
                <label class="itemdrop2 int20w400" for="couleur">
                    <input type="checkbox" id="couleur" name="couleur" class="marg20">
                    Couleur
                </label>
                <label class="itemdrop2 int20w400" for="couleur1">
                    <input type="checkbox" id="couleur1" name="couleur" class="marg20">
                    Couleur1
                </label>
            </div>
        </div>
        <div class="btn_filtre">

            <button type="submit" class="btn_grand pd24w600" title="Trouver">Trouver</button>
        </div>
    </div>



</form>