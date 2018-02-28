<?php
    require_once("bd.php");
    class Produit{
        private $co ;
        private $limite;
        private $prix;
        private $nom;
        private $stock;
        private $idProduit;
        
        function __construct() {
	$n=func_num_args();
	$args=func_get_args();
	if ($n==6){
		$this->co = $args[0];
		$this->limite = $args[1];
		$this->prix = $args[2];
        $this->nom = $args[3];
        $this->stock = $args[4];
        $this->idProduit = $args[5];
        $resultat = mysqli_query($this->co,"SELECT idProduit FROM produit WHERE idProduit='$this->idProduit'");
        if(mysqli_fetch_assoc($resultat)==0){
		$resultat = mysqli_query($this->co,"SELECT NomProduit,idProduit FROM produitunique WHERE NomProduit='$this->nom' AND idProduit='$this->idProduit'");
		if(mysqli_fetch_assoc($resultat)==0){
            mysqli_query($this->co,"INSERT INTO produit VALUES ('$this->idProduit')");
            mysqli_query($this->co, "INSERT INTO produitUnique (Limite,PrixVente,NomProduit,Stock,idProduit) VALUES ('$this->limite','$this->prix','$this->nom','$this->stock','$this->idProduit')");
		}
        else{
			echo "Ce produit existe déja.";
        }
        }
        else{
            echo "Ce produit existe déja.";
        }
	}
	if($n==3){
	}
    if($n==2){
        $this->co = $args[0];
        $this->idProduit = $args[1];
        $resultat = mysqli_query($this->co,"SELECT idProduit FROM produit WHERE idProduit='$this->idProduit'");
        if(mysqli_fetch_assoc($resultat)!=0){
            mysqli_query($this->co,"DELETE FROM produitunique WHERE idProduit = '$this->idProduit'");
            mysqli_query($this->co,"DELETE FROM produit WHERE IdProduit='$this->idProduit'");
        }
        else{
            echo("Identifiant de l'enfant inconnu.");
        }
    }
	
}
    }

?>