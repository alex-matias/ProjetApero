<?php
    require_once('../modeles/bd.php');
    $idProduit=$_POST['idProduit'];
    $montant=$_POST['montant'];
    //Mise a jour du stock du produit
    $resultat=mysqli_query($co,"UPDATE produitunique SET stock=stock+'$montant' WHERE idProduit='$idProduit'");
    header('Location:../vues/gerer_produit.php');
?>