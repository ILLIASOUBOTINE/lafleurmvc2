<h1 class="pd40w700 marg20top titre_account">Connexion</h1>
<?php if (isset($messageError)): ?>
<h1 class="pd40w700 marg20top titre_account">
    <?=$messageError?>
</h1>
<?php endif ?>
<?php if (isset($messageSucces)): ?>
<h1 class="pd40w700 marg20top titre_account">
    <?=$messageSucces?>
</h1>
<?php endif ?>
<section class="section_account_identification">
    <?php include 'components/form_connexion.php'?>
</section>