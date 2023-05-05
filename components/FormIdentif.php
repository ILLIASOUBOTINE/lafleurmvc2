<?php
class FormIdentif {
  public static function form_identif($actionForm,$classForm,$nomForm) {
    
    echo('<form action="'.$actionForm.'" method="POST" class="formulair_identif '.$classForm.'">
      <input type="hidden" name="csrf_token" value="'.$_SESSION['csrf_token'].'">
      <h3 class="titre_formulair_identif pd24w600">'.$nomForm.'</h3>
      <input type="text" class="inp_formulair_identif" name="email" placeholder="E-mail">
      <input type="text" class="inp_formulair_identif" name="password" placeholder=" Mot de passe">
      <button class="btn_grand pd24w600" type="submit">Valider</button>
      </form>');
  }
}