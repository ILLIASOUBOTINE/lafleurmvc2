<?php

if(!isset($_SESSION['villes'])){
    $notreLivraison = new NotreLivraisonManager();
    $villes = $notreLivraison->getAll();
    $_SESSION['villes'] = $villes;
}else {
    $villes = $_SESSION['villes'];
}

if(!isset($_SESSION['especeFleures'])){
    $especeFleuresM = new EspeceFleurManager();
    $especeFleures = $especeFleuresM->getAll();
    $_SESSION['especeFleures'] = $especeFleures;
}else {
    $especeFleures = $_SESSION['especeFleures'];
}

if(!isset($_SESSION['categories'])){
    $categoriesM = new CategorieManager();
    $categories = $categoriesM->getAll();
    $_SESSION['categories'] = $categories;
}else {
    $categories = $_SESSION['categories'];
}

if(!isset($_SESSION['couleures'])){
    $couleuresM = new CouleurManager();
    $couleures = $couleuresM->getAll();
    $_SESSION['couleures'] = $couleures;
}else {
    $couleures = $_SESSION['couleures'];
}

if(!isset($_SESSION['offreProduits'])){
    $offre = new ProduitManager();
    $offreProduits = $offre->getProduitOffre(0,4);
    $_SESSION['offreProduits'] = $offreProduits;
}else {
    $offreProduits = $_SESSION['offreProduits'];
}

if(!isset($_SESSION['populaireProduits'])){
    $populaire = new ProduitManager();
    $populaireProduits = $populaire->getProduitPopulair(4);
    $_SESSION['populaireProduits'] = $populaireProduits;
}else {
    $populaireProduits = $_SESSION['populaireProduits'];
}

if(!isset($_SESSION['banniere'])){
    $banniereM = new BanniereManager();
    $banniere = $banniereM->getById(1);
    $_SESSION['banniere'] = $banniere;
}else {
   $banniere = $_SESSION['banniere'];
}