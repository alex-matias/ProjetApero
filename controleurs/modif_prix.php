<?php
    require_once('../modeles/bd.php');
    $idProduit=$_POST['idProduit'];
    $montant=$_POST['montant'];
    //Modification du prix du produit dans la BD
    $resultat=mysqli_query($co,"UPDATE produitunique SET PrixVente='$montant' WHERE idProduit='$idProduit'");
    header('Location:../vues/gerer_produit.php');
?>