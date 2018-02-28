<!-- Classe Utilisateur -->

<?php
    require_once("bd.php");
    class Utilisateur{
        private $co ;
        private $pseudo;
        private $mdp;
        
        function __construct() {
	$n=func_num_args();
	$args=func_get_args();
	//S'il y a 4 arguments, ajout l'utilisateur a la bd
	if ($n==4){
		$this->co = $args[0];
		$this->pseudo = $args[1];
		$this->mdp = $args[2];
		$resultat = mysqli_query($this->co,"SELECT Login,MotDePasse FROM utilisateur WHERE Login='$this->pseudo' AND MotDePasse = '$this->mdp'");
		if(mysqli_fetch_assoc($resultat)==0){
            echo("Enregistrement réussi");
            mysqli_query($this->co, "INSERT INTO utilisateur (Login, MotDePasse) VALUES ('$this->pseudo','$this->mdp')");
		}
        else{
			echo "Ce nom d'utilisateur existe déja.";
        }
	}
	if($n==3){
        $this->co = $args[0];
		$this->pseudo = $args[1];
		$this->mdp = $args[2];
	}

	//s'il y a deux arguments, supprime l'utilisateur de la bd
    if($n==2){
        $this->co = $args[0];
        $this->pseudo = $args[1];
        $resultat = mysqli_query($this->co,"DELETE FROM utilisateur WHERE Login = '$this->pseudo'");
    }
	
}

        //Fonction de connexion, qui créé une session avec les valeurs associées. Si le pseudo est celui du président, renvoie sur la bonne page
        public function connexion() {
            session_start();
            $_SESSION['pseudo']=$this->pseudo;
            $_SESSION['mdp']=$this->mdp;
            $resultat=mysqli_query($this->co,"SELECT Login FROM president WHERE Login = '$this->pseudo'");
            if(mysqli_fetch_row($resultat)==0){
                header('Location:../vues/page_parent.php');
            }
            else{
                header('Location:../vues/page_president.php');
            }
        }
         //Fonction de deconnexion qui détruit la session, et ferme la connexion a la BD
        public function deconnexion() {
            session_unset();
            session_destroy();
            mysqli_close($co);
        }
    }

?>