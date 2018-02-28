<?php
    require_once('../modeles/bd.php');
    $idEnfant=$_POST['idEnfant'];
    $nomProduit=$_POST['nomProduit'];
    $resultat=mysqli_query($co,"SELECT PrixVente FROM produitunique WHERE NomProduit='$nomProduit'");
    $row=mysqli_fetch_row($resultat);
    $prix=$row[0];
    $resultat=mysqli_query($co,"UPDATE enfant SET solde=solde-'$prix' WHERE idEnfant='$idEnfant'");
    header('Location:../vues/page_parent.php');
?>