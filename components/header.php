<header>
    <nav class="nav_left">
        <a class="pd24w600 marg20" href="#">Blog</a>
        <a class="pd24w600 marg20" href="/">Accueil</a>
        <a class="pd24w600 marg20" href="contact">Contact</a>
    </nav>
    <nav class="nav_left_phone">
        <div class="burger_menu cursorscall20">
            <div class="burger_ligne"></div>
            <div class="burger_ligne">
                <div class="burger_ligne"></div>
            </div>
            <div class="burger_ligne"></div>
        </div>
        <a href="#"><img class="cursorscall20" src="public/imgs/general/account_icon.svg" alt="account"></a>
    </nav>

    <nav id="idDropMenue" class="drop_menu">

        <a class="pd24w600 itemdrop" href="/">Accueil</a>
        <a class="pd24w600 itemdrop" href="contact">Contact</a>
        <a class="pd24w600 itemdrop" href="#">Blog</a>
        <div id="filtreProduit" class="pd24w600 itemdrop filtreProduit">
            <span>Filtre produit</span>
            <img src="public/imgs/general/icons_triangle-down.svg" alt="">
        </div>
        <?php include 'components/list_filtre.php'?>

    </nav>
    <a class="logo cursorscall20" href="/"><img src="public/imgs/general/logo.png" alt="accueil"></a>
    <nav class="nav_right">
        <a class="marg20 idAccount" href="#"><img class="cursorscall20" src="public/imgs/general/account_icon.svg"
                alt="account"></a>
        <img class="marg20 cursorscall20 idlivraison" src="public/imgs/general/delivery_icon.svg" alt="livraison">
        <img class="marg20 cursorscall20" src="public/imgs/general/basket_icon.svg" alt="panier">
    </nav>
    <?php include 'components/list_livraison.php'?>
</header>