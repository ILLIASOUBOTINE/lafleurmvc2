<h1 class="pd40w700 marg20top titre_commande_etape">Cadeau</h1>

<div class="loto">
    <p class="loto_title pd40w700 marg20top"></p>
    <div class="loto_body">
        <img id="loto_item1" class="loto_item" />
        <img id="loto_item2" class="loto_item" />
        <img id="loto_item3" class="loto_item" />
    </div>
    <input id="btnStop" type="button" class="btn_loto btn_grand pd24w600 dnone" value="stop" />
    <input id="btnStart" type="button" class="btn_loto btn_grand pd24w600" value="start" />
    <a href="./monAccount" id="btnVoirCommande" class="btn_loto btn_grand pd24w600 dnone">voir la commande</a>
    <p class="jsonCadeaux dnone">
        <?= $jsonCadeaux ?>
    </p>
</div>