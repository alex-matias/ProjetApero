<?php
    require_once('../modeles/enfant.php');
    session_start();
    $idEnfant=$_POST['idEnfant'];
    $nom=$_POST['nomEnfant'];
    $prenom=$_POST['prenomEnfant'];
    $dateNaiss=$_POST['dateNaiss'];
    $telParent=$_POST['telParent'];
    $mailParent=$_POST['mailParent'];
    $monEnfant = new enfant($co,$idEnfant,$nom,$prenom,$dateNaiss,$telParent,$mailParent) ;
    $pseudo=$_SESSION['pseudo'];
    $resultat=mysqli_query($co,"SELECT Login FROM president WHERE Login = '$pseudo'");
    if(mysqli_fetch_row($resultat)==0){
        header('Location:../vues/page_parent.php');
    }
    else{
        header('Location:../vues/page_president.php');
    }
    

?>