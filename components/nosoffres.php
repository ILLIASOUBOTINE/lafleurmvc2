<?php
// include 'application/entity/Carte.class.php';
use application\entity\Carte;
$arr1 = array(
    array(
        "id"=>1,
        "title"=>"Title1",
        "prix"=>50,
        "urlPhoto"=>"public/imgs/fleurs/rose_blanch.jpg",
        "dispo"=>"Ajouter",
    ),
    array(
        "id"=>2,
        "title"=>"Title2",
        "prix"=>50,
        "urlPhoto"=>"public/imgs/fleurs/rose_blanch.jpg",
        "dispo"=>"Indisponible",
    ),  
    array(
        "id"=>3,
        "title"=>"Title3",
        "prix"=>50,
        "urlPhoto"=>"public/imgs/fleurs/rose_blanch.jpg",
        "dispo"=>"Ajouter",
    ),  
    array(
        "id"=>4,
        "title"=>"Title4",
        "prix"=>50,
        "urlPhoto"=>"public/imgs/fleurs/rose_blanch.jpg",
        "dispo"=>"Ajouter",
    ),
    array(
        "id"=>5,
        "title"=>"Title1",
        "prix"=>50,
        "urlPhoto"=>"public/imgs/fleurs/rose_blanch.jpg",
        "dispo"=>"Ajouter",
    ),
    array(
        "id"=>6,
        "title"=>"Title2",
        "prix"=>50,
        "urlPhoto"=>"public/imgs/fleurs/rose_blanch.jpg",
        "dispo"=>"Indisponible",
    ),  
    array(
        "id"=>7,
        "title"=>"Title3",
        "prix"=>50,
        "urlPhoto"=>"public/imgs/fleurs/rose_blanch.jpg",
        "dispo"=>"Ajouter",
    ),  
    array(
        "id"=>8,
        "title"=>"Title4",
        "prix"=>50,
        "urlPhoto"=>"public/imgs/fleurs/rose_blanch.jpg",
        "dispo"=>"Ajouter",
    ),
  
   
 

);
?>
<section class="populaire_section">
    <h2 class="pd40w700 marg20top">Nos offres</h2>
    <div class="block_carte">
        <?php for ($i=0; $i < count($arr1)/4; $i++):
        // echo $i;
             $arr2 = array_slice($arr1,$i*4,4);
            //  echo $i+1;
            //   print_r($arr2);?>
        <div class="populaire_carte">
            <?php foreach($arr2 as $carte){
                $newCarte = new Carte(
                    $carte['id'],
                    $carte['title'],
                    $carte['prix'],
                    $carte['urlPhoto'],
                    $carte['dispo'],
                );
                echo $newCarte->createViewHtmlCarte();
                // $arr2 = [];
            }
            ?>
        </div>
        <?php endfor?>


    </div>

    <button class="btn_grand pd24w600" title="Montre plus">Montre plus</button>

</section>