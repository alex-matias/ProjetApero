<?php
    require_once('../modeles/utilisateur.php');
    session_start();
    $pseudo=$_SESSION['pseudo'];
    $mdp=$_SESSION['mdp'];
    $monUtilisateur = new Utilisateur($co,$pseudo,$mdp) ;
    $monUtilisateur->deconnexion();
    header('location:../vues/formulaire_connexion.php');
?>