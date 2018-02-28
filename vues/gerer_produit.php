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
	<div id="bloc_page">
         <form method="post" action="../controleurs/deconnexion.php">
            <input class="btn2" type="submit" value="Se deconnecter">
        </form>
		<div class="packs" style="background-color: rgba(255,255,255,0.7)">
			<h1 class="titre">Gerer les produits </h1>
			<br>
				<div id="corps">
				<br>
				<br>
                    <!-- formulaire d'ajout de produit au gouter, renvoie vers le controleur d'ajout de produit -->
				<form method="post" action="../controleurs/ajout_produit.php">
					<fieldset name="ajout_produit">
						<legend class="co">Ajout d'un produit</legend>
						<br>
						<label for="idProduit">ID du produit :</label>
						<br>
						<input type="number" name="idProduit" required>
						<br>
						<br>
						<label for="nom">Nom du produit :</label>
						<br>
						<input type="text" name="nom" required>
						<br>
						<br>
						<label for="prix">Prix :</label>
						<br>
						<input type="number" name="prix" step="0.1" required>
						<br>
						<br>
                        <label for="stock">Stock</label>
                        <br>
                        <input type="number" name="stock" required>
                        <br>
                        <br>
                        <label for="limite">Limite avant alerte !</label>
                        <br>
                        <input type="number" name="limite" required>
                        <br>
                        <br>
						<input type="submit" value="Ajouter">
						<br>
						</fieldset>
						<br>
                    </form>
				</div>
				</div>
				<div class="tab" style="background-color: rgba(255,255,255,0.7)">
                    <!-- Tableau affichant tous les produits -->
                        <?php
                            require_once('../modeles/bd.php');
                            echo "<table>
                            <caption>Les produits disponibles :</caption>";
                            echo "<tr><th>idProduit</th><th>Nom</th><th>Prix</th><th>Stock</th></tr>";
                            $resultat = mysqli_query($co, "SELECT idProduit,nomProduit,PrixVente,Stock FROM produitunique ");
                            $nb_rows = mysqli_num_rows($resultat);
                            while($row= mysqli_fetch_row($resultat)){
                            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>
        <!-- Formulaire de suppression de produit -->
        <form method='post' action='../controleurs/suppr_produit.php'><input type='number' name='idProduit' hidden='' value='$row[0]'><input type='submit' value='Supprimer'></form></td><td>
        
        <!-- Formulaire d'ajout du stock d'un produit-->
        <form method='post' action='../controleurs/ajout_stock.php'>
        <input type='number' name='idProduit' hidden='' value='$row[0]'>
        <input type='number' name='montant' placeholder='Ajouter stock'>
        <input type='submit' value='Ajouter'>
        </form></td><td>
        
        <!-- Formulaire de modification du prix du produit -->
        <form method='post' action='../controleurs/modif_prix.php'>
        <input type='number' name='idProduit' hidden='' value='$row[0]'>
        <input type='number' name='montant' step='0.1' placeholder='Modifier prix'>
        <input type='submit' value='Modifier'>
        </form></td></tr>";
                            }
                            echo "</table>";
                        ?>
		</div>
	</div>
</body>
</html>