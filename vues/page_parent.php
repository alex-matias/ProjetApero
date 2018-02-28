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
                <li><a href="nous_contacter.php">Nous contacter</a></li>
            </ul>
        </nav>
    </header>
	<div id="bloc_page">
	     <form method="post" action="../controleurs/deconnexion.php">
            <input class="btn2" type="submit" value="Se deconnecter">
        </form>
	<div class="packs" style="background-color: rgba(255,255,255,0.7)">
    <h1 class="titre">Vous êtes dans votre espace membre !</h1>
        <br>
		<br>
		<div id="corps">
				<br>
				<form method="post" action="../controleurs/ajout_enfant.php">
					<fieldset name="ajout_enfant">
						<legend>Ajouter un enfant :</legend>
						<br>
						<label for="idEnfant">Numéro carte enfant :</label>
						<input type="number" name="idEnfant" required>
						<br>
						<label for="nomEnfant">Nom :</label>
						<input type="text" name="nomEnfant" placeholder="Nom" required>
						<br>
						<label for="prenomEnfant">Prénom :</label>
						<input type="text" name="prenomEnfant" placeholder="Prénom" required>
						<br>
						<label for="dateNaiss">Date de naissance :</label>
						<input type="date" name="dateNaiss" required>
						<br>
						<label for="telParent">Téléphone d'un parent : </label>
						<input type="tel" name="telParent" placeholder="Téléphone" required>
						<br>
						<label for="mailParent">Mail d'un parent :</label>
						<input type="email" name="mailParent" placeholder="Mail" required>
						<br>
						<br>
						<input type="submit" value="Ajouter">
					</fieldset>
				</form>
				<br>
		</div>
	</div>
	<div class="tab" style="background-color: rgba(255,255,255,0.7)">
			<?php
			require_once('../modeles/bd.php');
		echo "<table>
					<caption>Les enfants inscrits :</caption>";
		echo "<tr><th>idEnfant</th><th>Nom</th><th>Prénom</th><th>Solde</th><th>Supprimer enfant</th><th>Ajouter argent</th></tr>";
		$resultat = mysqli_query($co, "SELECT idEnfant,nomEnf, prenomEnfant,solde FROM enfant ");
		$nb_rows = mysqli_num_rows($resultat);
		while($row= mysqli_fetch_row($resultat)){
			echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td><form method='post' action='../controleurs/suppr_enfant.php'>
			<input type='number' name='idEnfant' hidden='' value='$row[0]'>
			<input type='submit' value='Supprimer'>
			</form></td>
			<td>
			<form method='post' action='../controleurs/ajout_solde.php'>
			<input type='number' name='idEnfant' hidden='' value='$row[0]'>
			<input type='number' name='montant' placeholder='montant' required>
			<input type='text' name='prenom' hidden='' value='$row[2]'>
			<input type='submit' value='Ajouter'>
			</form></td></tr>";
		}
		echo "</table>";
		?>
		<br>
		<br>
		<form method="post" action="../controleurs/acheter.php">
        <label for="idEnfant">ID Enfant :</label>
        <input type="number" name="idEnfant" required>
        <label for="nomProduit">Produit souhaité :</label>
        <select name="nomProduit" required>
            <?php
            require_once('../modeles/bd.php');
            $resultat=mysqli_query($co,"SELECT NomProduit FROM produitunique");
            while($produit=mysqli_fetch_row($resultat)){
                echo "<option>$produit[0]</option>";
            }
            ?>
        </select>
        <input type="submit" value="Acheter">
    </form>
	<br>
	</div>
	</div>
</body>
</html>