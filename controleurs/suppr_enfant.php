<?php
    require_once('../modeles/enfant.php');
    $idEnfant=$_POST['idEnfant'];
    //Création d'un enfant
    $monEnfant = new Enfant($co,$idEnfant);
    session_start();
    $pseudo=$_SESSION['pseudo'];
    //Redirection en fonction du pseudo
    $resultat=mysqli_query($co,"SELECT Login FROM president WHERE Login = '$pseudo'");
    if(mysqli_fetch_row($resultat)==0){
        header('Location:../vues/page_parent.php');
    }
    else{
        header('Location:../vues/page_president.php');
    }
    
?>