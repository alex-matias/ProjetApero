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
		<div class="packs3" style="background-color: rgba(255,255,255,0.7)">
			<h1 class="titre">Gerer les parents </h1>
			<br>
				<div id="connec">
				<br>
				<form method="post" action="../controleurs/inscription.php">
					<fieldset name="ajout_enfant">
						<legend class="co">Ajout d'un parent</legend>
						<br>
						<label for="pseudo">Pseudo :</label>
						<br>
						<input type="text" name="pseudo" placeholder="pseudo" required>
						<br>
						<br>
						<label for="mdp">Mot de passe :</label>
						<br>
						<input type="password" name="mdp" placeholder="mot de passe" required>
						<br>
						<br>
						<label for="mail">Adresse e-mail :</label>
						<br>
						<input type="email" name="mail" placeholder="adresse@mail.com" required>
						<br>
						<br>
						<input type="submit" value="Ajouter">
						</fieldset>
                    </form>
					</div>
					</div>
					<div class="tabs3" style="background-color: rgba(255,255,255,0.7)">
                        <?php
                            require_once('../modeles/bd.php');
                            echo "<table>
                            <caption>Les parents inscrits :</caption>";
                            echo "<tr><th>Pseudo</th><th>Supprimer</th></tr>";
                            $resultat = mysqli_query($co, "SELECT Login FROM utilisateur ");
                            $nb_rows = mysqli_num_rows($resultat);
                            while($row= mysqli_fetch_row($resultat)){
                            echo "<tr><td>$row[0]</td><td><form method='post' action='../controleurs/suppr_user.php'>
                            <input type='text' name='pseudo' hidden='' value='$row[0]'>
                            <input type='submit' value='Supprimer'>
                            </form></td></tr>";
                            }
                            echo "</table>";
                        ?>
				</div>
			</div>
</body>
</html>