<?php
    require_once('../modeles/utilisateur.php');
    require_once('../modeles/bd.php');
    $pseudo=$_POST['pseudo'];
    $mdp=$_POST['mdp'];
    $resultat=mysqli_query($co, "SELECT Login,MotDePasse FROM utilisateur WHERE Login='$pseudo' AND MotDePasse = '$mdp'");
    if(mysqli_fetch_assoc($resultat)!=0){
        $monUtilisateur = new Utilisateur($co,$pseudo,$mdp);
        $monUtilisateur->connexion();
    }
    else{
        echo("Pseudo ou mot de passe incorrect.");
    }
    
?>
