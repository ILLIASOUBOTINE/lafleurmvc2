<h1 class="pd40w700 marg20top titre_commande_etape">Identification</h1>

<section class="section_commande_etape">
    <?php include 'components/etape_commande.php'?>
</section>
<section class="section_commande_identification">
    <div class="commande_block_panier">
        <?php include 'components/panier.php'?>
    </div>
    <div class="commande_block_form">

        <?php include 'components/message_error.php'?>
        <?php 
            FormIdentif::form_identif('/connexionCommande','formulair_connexion','Connexion');
            FormIdentif::form_identif('/inscriptionCommande','formulair_inscription','Inscription');
        ?>

    </div>
</section>