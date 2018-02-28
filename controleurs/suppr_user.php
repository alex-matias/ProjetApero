<?php
    require_once('../modeles/utilisateur.php');
    $pseudo=$_POST['pseudo'];
    $monUtilisateur = new Utilisateur($co,$pseudo);
    header('Location:../vues/formulaire_inscription.php');
?>