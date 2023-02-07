<h1>Details</h1>
<?php var_dump($produit)?>

<div class="carusel">
    <img class="chevron_left" src="public/imgs/general/chevron_left.svg" alt="">
    <div class="list_carusel">
        <?php foreach($produit->getPhotos() as $photo):?>
        <div class="div_img">
            <img src="public/imgs/fleurs/<?=$photo->getImgUrl()?>" alt="">
        </div>
        <?php endforeach?>

    </div>
    <img class="chevron_right" src="public/imgs/general/chevron_right.svg" alt="">
</div>