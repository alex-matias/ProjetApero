<?php
    require_once('../modeles/utilisateur.php');
    $pseudo=$_POST['pseudo'];
    $mdp=$_POST['mdp'];
    $mail=$_POST['mail'];
    //Création d'un utilisateur lors de l'inscription
    $monUtilisateur = new Utilisateur($co,$pseudo,$mdp,$mail);
    header('Location:../vues/formulaire_inscription.php');
?>