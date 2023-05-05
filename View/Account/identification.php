<h1 class="pd40w700 marg20top titre_account">Identification</h1>
<?php if (isset($messageSucces)): ?>
<h1 class="pd40w700 marg20top titre_account">
    <?=$messageSucces?>
</h1>
<?php endif ?>
<section class="section_account_identification">
    <?php include 'components/message_error.php'?>
    <?php 
    FormIdentif::form_identif('connexion','formulair_connexion','Connexion');
    FormIdentif::form_identif('inscription','formulair_inscription','Inscription');
    ?>
</section>