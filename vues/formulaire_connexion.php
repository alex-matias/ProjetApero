<html lang="fr">
<head>
  <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/stylePr.css" />
    <title>Apero</title>
</head>
<body>
    <!-- Header avec logo + navbar -->
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

    <!-- Corps de la page avec le titre et le formulaire -->

    <div id="bloc_page">
		<br>
		<br>
		<div class="pack" style="background-color: rgba(255,255,255,0.7)">
			<h1 class="titre">Connectez-vous !</h1>
			<br>
			<br>
			<div id="conneci">
				<br>

                <!-- formulaire de connexion, renvoie vers le controleur de connexion -->
				<form method="post" action="../controleurs/connexion.php">
				<fieldset name="ajout_enfant">
					<legend class="co">Connection :</legend>
					<br>
					<label for="pseudo" class="pseudo">Pseudo :</label>
					<br>
					<input type="text" name="pseudo" placeholder="pseudo">
					<br>
					<br>
					<label for="mdp">Mot de passe :</label>
					<br>
					<input type="password" name="mdp" placeholder="mot de passe">
					<br>    
					<br>
					<input type="submit" value="Se connecter" class="btn">
					</fieldset>
					</br>
				</form>
			</div>
		</div>
		<br>
	</div>
</body>
</html>