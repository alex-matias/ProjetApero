<?php
    require_once('../modeles/enfant.php');
    session_start();
    $idEnfant=$_POST['idEnfant'];
    $nom=$_POST['nomEnfant'];
    $prenom=$_POST['prenomEnfant'];
    $dateNaiss=$_POST['dateNaiss'];
    $telParent=$_POST['telParent'];
    $mailParent=$_POST['mailParent'];
    //Création d'un enfant, 7 arguments donc ajout dans la BD
    $monEnfant = new enfant($co,$idEnfant,$nom,$prenom,$dateNaiss,$telParent,$mailParent) ;
    $pseudo=$_SESSION['pseudo'];
    //Redirection en fonction du pseudo de l'utilisateur, si c'est un utilisateur lambda ou le président
    $resultat=mysqli_query($co,"SELECT Login FROM president WHERE Login = '$pseudo'");
    if(mysqli_fetch_row($resultat)==0){
        header('Location:../vues/page_parent.php');
    }
    else{
        header('Location:../vues/page_president.php');
    }
    

?>