<form action="/controlFormLivraison" method="POST" class="formulair_identif">

    <h3 class="titre_formulair_identif pd24w600">Adresse de livraison</h3>

    <?php if(isset($_SESSION['livraison'])):?>
    <select type="numbre" class="inp_formulair_identif" name="id_ville" placeholder="ville">
        <?php foreach($villes as $ville):?>
        <?php if($_SESSION['livraison']->id_ville == $ville->getIdVille()):?>
        <option value="<?=$ville->getIdVille() ?>" selected><?=$ville->getNomVille()?></option>
        <?php else: ?>
        <option value="<?=$ville->getIdVille() ?>"><?=$ville->getNomVille() ?></option>
        <?php endif ?>

        <?php endforeach ?>
    </select>
    <input type="text" class="inp_formulair_identif" name="rue" value="<?=$_SESSION['livraison']->id_ville?>"
        placeholder="rue">
    <input type="text" class="inp_formulair_identif" name="num_maison" value="<?=$_SESSION['livraison']->num_maison?>"
        placeholder="numéro de maison">
    <input type="text" class="inp_formulair_identif" name="num_appart" value="<?=$_SESSION['livraison']->num_appart?>"
        placeholder="numéro d'appartement">
    <input type="text" class="inp_formulair_identif" name="num_telephone"
        value="<?=$_SESSION['livraison']->num_telephone?>" placeholder="numéro de téléphone">
    <h3 class="titre_formulair_identif pd24w600">Date de livraison</h3>
    <input type="text" class="inp_formulair_identif" name="date_prevu" value="<?=$_SESSION['livraison']->date_prevu?>"
        placeholder="09-10-2023">

    <?php else: ?>
    <select type="numbre" class="inp_formulair_identif" name="id_ville" placeholder="ville">
        <?php foreach($villes as $ville):?>
        <option value="<?=$ville->getIdVille() ?>"><?=$ville->getNomVille() ?></option>
        <?php endforeach ?>
    </select>
    <input type="text" class="inp_formulair_identif" name="rue" placeholder="rue">
    <input type="text" class="inp_formulair_identif" name="num_maison" placeholder="numéro de maison">
    <input type="text" class="inp_formulair_identif" name="num_appart" placeholder="numéro d'appartement">
    <input type="text" class="inp_formulair_identif" name="num_telephone" placeholder="numéro de téléphone">
    <h3 class="titre_formulair_identif pd24w600">Date de livraison</h3>
    <input type="text" class="inp_formulair_identif" name="date_prevu" placeholder="09-10-2023">

    <?php endif ?>
    <input type="text" id="dataPanier" name="dataPanier" class="dnone">
    <button id="panierValider" class="btn_grand pd24w600" type="button">Valider</button>
</form>