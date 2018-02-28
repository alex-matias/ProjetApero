<!-- Classe enfant -->
<?php
    require_once("bd.php");
    class Enfant{
        private $co ;
        private $idEnfant;
        private $nom;
        private $prenom;
        private $dateNaiss;
        private $telParent;
        private $mailParent;
        private $idCateg;
        
        function __construct() {
	$n=func_num_args();
	$args=func_get_args();
	//S'il y a 7 arguments, ajout de l'enfant dans la BD  s'il n'y est pas déja
	if ($n==7){
		$this->co = $args[0];
		$this->idEnfant = $args[1];
		$this->nom = $args[2];
        $this->prenom = $args[3];
        $this->dateNaiss = $args[4];
        $this->telParent = $args[5];
        $this->mailParent = $args[6];

        //Ajout de la catégorie à l'enfant en fonction de sa date de naissance
        if($this->dateNaiss<='1996/12/31' && $this->dateNaiss>='1998/01/01'){
            $this->idCateg=5;
        }
        else if($this->dateNaiss<='1999/12/31' && $this->dateNaiss>='2000/01/01'){
            $this->idCateg=4;
        }
        else if($this->dateNaiss<='2001/12/31' && $this->dateNaiss>='2002/01/01'){
            $this->idCateg=3;
        }
        else if($this->dateNaiss<='2003/12/31' && $this->dateNaiss>='2004/01/01'){
            $this->idCateg=2;
        }
        else if($this->dateNaiss<='2005/12/31' && $this->dateNaiss>='2006/01/01'){
            $this->idCateg=1;
        }
        else{
            $this->idCateg=0;
        }
		$resultat = mysqli_query($this->co,"SELECT idEnfant,nomEnf,prenomEnfant FROM enfant WHERE idEnfant='$this->idEnfant' AND nomEnf = '$this->nom' AND prenomEnfant='$this->prenom'");
		if(mysqli_fetch_assoc($resultat)==0){
            mysqli_query($this->co, "INSERT INTO enfant (idEnfant, nomEnf,prenomEnfant,dtaNaissance,telParent,mailParent,idCategorie,solde) VALUES ('$this->idEnfant','$this->nom','$this->prenom','$this->dateNaiss','$this->telParent','$this->mailParent','$this->idCateg','0')");
		}
        else{
			echo "Cet enfant existe déja.";
        }
	}

	//S'il n'y a que deux arguments, l'enfant en question, s'il est déja dans la BD est supprimé de la BD
	if($n==2){
        $this->co = $args[0];
		$this->idEnfant = $args[1];
		$resultat = mysqli_query($this->co,"SELECT idEnfant FROM enfant WHERE idEnfant='$this->idEnfant'");
        if(mysqli_fetch_assoc($resultat)!=0){
            $resultat=mysqli_query($this->co,"DELETE FROM enfant WHERE idEnfant = '$this->idEnfant'");
        }
        else{
            echo("Identifiant de l'enfant inconnu.");
        }
	}
	
}

    }

?>