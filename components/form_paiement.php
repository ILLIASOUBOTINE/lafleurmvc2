<form action="/controlPaiement" method="POST" class="formulair_identif formulair_connexion">
    <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token']?>">
    <h3 class="titre_formulair_identif pd24w600">Carte bancaire </h3>
    <input type="text" class="inp_formulair_identif" name="nom" placeholder="Nom sur la carte">
    <input type="text" class="inp_formulair_identif" name="numero" placeholder="Numéro de carte bancaire">
    <input type="text" class="inp_formulair_identif" name="expiration" placeholder="Date d'expiration">
    <input type="text" class="inp_formulair_identif" name="cryptogramme" placeholder="Cryptogramme visuel">
    <button class="btn_grand pd24w600" type="submit">Payer</button>
</form>