

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" />
		<title>Mini-chat amélioré</title>
	</head>

	<body>
		<!-- 
			TP du cours:  Concevez votre site web avec PHP et MySQL - Partie 4 - Activité finale 
		-->

		<!-- Création du formulaire -->
		<form method="post" action="traitement.php">
		<!-- 
			TO DO : rendre les champs obligatoire une fois que ça fonctionnera
			autofocus/>
		-->
		<p>
			<label for="pseudo">Pseudo: </label>
			<input type="text" name="pseudo" id ="pseudo" size ="22" value="<?php if(isset($_COOKIE['pseudo_chat'])) { echo $_COOKIE['pseudo_chat']; } // else { echo 'Saisir votre pseudo'; } ?>" placeholder = "<?php if(!isset($_COOKIE['pseudo_chat'])) { echo 'Saisir votre pseudo'; } ?>" />												
		</p>
		<p>
			<label for="message">Message: </label>
			<textarea name="message" id="message" cols="35" rows="7" ></textarea>	
		</p>
		<p>
			<input type="submit" value="Envoyer"/>
		</p>
		</form>
	

		<?php
			// Connexion à la BDD
			try {
				$bdd = new PDO('mysql:hostname=localhost;dbname=mini_chat_v2;charset=utf8', 'root', '');
			} 
			catch(Exception $e) {
				die ('Erreur : ' .$e->getMessage());
			}

			// Selection des message
			$req = $bdd->query('SELECT DATE_FORMAT(date_ajout, \'%d-%m-%Y %H:%i:%s\') AS date_message, pseudo, message FROM chat');
			// On aurait pu utiliser aussi une requête préparée
			while($donnees = $req->fetch()) {
				echo'<p> ['. htmlspecialchars($donnees['date_message']) . '] <span class="pseudo"> ' . htmlspecialchars($donnees['pseudo']) . ' </span> : ' . htmlspecialchars($donnees['message']) . '</p>'; 
			}
			
			$reponse->closeCursor();
		?>

	</body>
</html>