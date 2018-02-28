<?php
    require_once('../modeles/enfant.php');
    require_once('../modeles/bd.php');
    $idEnfant=$_POST['idEnfant'];
    $montant=$_POST['montant'];
    $prenom=$_POST['prenom'];
    $resultat=mysqli_query($co,"UPDATE enfant SET solde=solde+'$montant' WHERE idEnfant='$idEnfant' AND prenomEnfant='$prenom'");
    header('Location:../vues/page_parent.php');
?>