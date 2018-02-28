<?php
    require_once('../modeles/produit.php');
    session_start();
    $limite=$_POST['limite'];
    $idProduit=$_POST['idProduit'];
    $stock=$_POST['stock'];
    $nom=$_POST['nom'];
    $prix=$_POST['prix'];
    //Création du produit
    $monProduit = new Produit($co,$limite,$prix,$nom,$stock,$idProduit);
    header('Location:../vues/gerer_produit.php');
?>
