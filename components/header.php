<header>
    <nav class="nav_left">
        <a class="pd24w600 marg20 cursorscall20" href="https://soubotine.needemand.com/realisations/lafleurBlog/"
            target="_blank">Blog</a>
        <a class="pd24w600 marg20 cursorscall20" href="./index">Accueil</a>
        <a class="pd24w600 marg20 cursorscall20" href="./contact">Contact</a>
    </nav>
    <nav class="nav_left_phone">
        <div class="burger_menu cursorscall20">
            <div class="burger_ligne"></div>
            <div class="burger_ligne">
                <div class="burger_ligne"></div>
            </div>
            <div class="burger_ligne"></div>
        </div>
        <a href="./account"><img class="cursorscall20" src="public/imgs/general/account_icon.svg" alt="account"></a>
    </nav>

    <nav id="idDropMenue" class="drop_menu">

        <a class="pd24w600 itemdrop" href="./index">Accueil</a>
        <a class="pd24w600 itemdrop" href="./contact">Contact</a>
        <a class="pd24w600 itemdrop" href="https://soubotine.needemand.com/realisations/lafleurBlog/"
            target="_blank">Blog</a>
        <div id="filtreProduit" class="pd24w600 itemdrop filtreProduit">
            <span>Filtre produit</span>
            <img src="public/imgs/general/icons_triangle-down.svg" alt="">
        </div>
        <?php include 'components/list_filtre.php'?>

    </nav>
    <a class="logo cursorscall20" href="./index"><img src="public/imgs/general/logo.png" alt="accueil"></a>
    <nav class="nav_right">
        <a class="marg20 idAccount" href="./account"><img class="cursorscall20"
                src="public/imgs/general/account_icon.svg" alt="account"></a>
        <img class="marg20 cursorscall20 idlivraison" src="public/imgs/general/delivery_icon.svg" alt="livraison">
        <div class="lable_panier"><img class="marg20 cursorscall20 idpanier" src="public/imgs/general/basket_icon.svg"
                alt="panier"></div>
    </nav>
    <?php include 'components/list_livraison.php'?>
    <?php include 'components/panier.php'?>
</header>