<?php
    require_once('../modeles/produit.php');
    $idProduit=$_POST['idProduit'];
    $monProduit = new Produit($co,$idProduit);
    header('Location:../vues/gerer_produit.php');
?>