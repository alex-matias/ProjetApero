<?php
require_once('../modeles/utilisateur.php');
session_start();
$pseudo=$_SESSION['pseudo'];
$mdp=$_SESSION['mdp'];
$monUtilisateur = new Utilisateur($co,$pseudo,$mdp) ;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/stylePr.css" />
    <title>Apero</title>
</head>
<body>
    <header>
        <div id="logo">
            <a href="index.php">
            <img src="../assets/images/logoApero.png" alt="Logo d'apero">
            </a>
        </div>
        <nav>
            <ul>
				<li><a href="gerer_produit.php">Gerer les produits</a></li>
				<li><a href="formulaire_inscription.php">Ajouter un parent</a></li>
                <li><a href="nous_contacter.php">Nous contacter</a></li>
            </ul>
        </nav>
    </header>
	<div id="bloc_page">
	<form method="post" action="../controleurs/deconnexion.php">
					<input class="btn2" type="submit" value="Se deconnecter">
				</form>	
		<div class="packs3" style="background-color: rgba(255,255,255,0.7)">
			<h1 class="titre">Vous êtes dans votre espace président !</h1>
				<br>
				<br>
			<br>
			<div id="corps">
				<br>
				<form method="post" action="../controleurs/ajout_enfant.php">
					<fieldset name="ajout_enfant">
						<legend class="co">Ajouter un enfant :</legend>
						<br>
						<label for="idEnfant">Numéro carte enfant :</label>
						<br>
						<input type="number" name="idEnfant" required>
						<br>
						<label for="nomEnfant">Nom :</label>
						<br>
						<input type="text" name="nomEnfant" placeholder="Nom" required>
						<br>
						<label for="prenomEnfant">Prénom :</label>
						<br>
						<input type="text" name="prenomEnfant" placeholder="Prénom" required>
						<br>
						<label for="dateNaiss">Date de naissance :</label>
						<br>
						<input type="date" name="dateNaiss" required>
						<br>
						<label for="telParent">Téléphone d'un parent : </label>
						<br>
						<input type="tel" name="telParent" placeholder="Téléphone" required>
						<br>
						<label for="mailParent">Mail d'un parent :</label>
						<br>
						<input type="email" name="mailParent" placeholder="Mail" required>
						<br>
						<br>
						<input type="submit" value="Ajouter">
					</fieldset>
				</form>
				<br>
			<br>
				</div>
					</div>
					<br>
				<div class="tabs" style="background-color: rgba(255,255,255,0.7)">
					<?php
					require_once('../modeles/bd.php');
				echo "<table>
							<caption>Les enfants inscrits :</caption>";
				echo "<tr><th>IdEnfant</th><th>Nom</th><th>Prénom</th><th>Solde</th></tr>";
				$resultat = mysqli_query($co, "SELECT idEnfant,nomEnf, prenomEnfant,solde FROM enfant ");
				$nb_rows = mysqli_num_rows($resultat);
				while($row= mysqli_fetch_row($resultat)){
					echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td><form method='post' action='../controleurs/suppr_enfant.php'>
					<input type='number' name='idEnfant' hidden='' value='$row[0]'>
					<input type='submit' value='Supprimer'>
					</form></td></tr>";
				}
				echo "</table>";
				?>
		</div>
    </div>
</body>
</html>