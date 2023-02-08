<?php

if(!isset($_SESSION['villes'])){
    $notreLivraison = new NotreLivraisonManager();
    $villes = $notreLivraison->getAll();
    $_SESSION['villes'] = $villes;
}else {
    $villes = $_SESSION['villes'];
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