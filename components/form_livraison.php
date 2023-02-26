<form action="/controlFormLivraison" method="POST" class="formulair_identif">

    <h3 class="titre_formulair_identif pd24w600">Adresse de livraison</h3>

    <select type="text" class="inp_formulair_identif" name="ville" placeholder="ville">
        <?php foreach($villes as $ville):?>
        <option value="<?=$ville->getIdVille() ?>"><?=$ville->getNomVille() ?></option>
        <?php endforeach ?>
    </select>
    <input type="text" class="inp_formulair_identif" name="rue" placeholder="rue">
    <input type="text" class="inp_formulair_identif" name="num_maison" placeholder="numéro de maison">
    <input type="text" class="inp_formulair_identif" name="num_appart" placeholder="numéro d'appartement">
    <input type="text" class="inp_formulair_identif" name="num_telephone" placeholder="numéro de téléphone">
    <h3 class="titre_formulair_identif pd24w600">Date de livraison</h3>
    <input type="text" class="inp_formulair_identif" name="date_livre" placeholder="09-10-2023">
    <button class="btn_grand pd24w600" type="submit">Valider</button>
</form>