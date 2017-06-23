<?php
if(isset($_POST['pseudo'])) 
{
	setcookie('pseudo_chat', $_POST['pseudo'], time() +365*24*3600, null, null, false, true); // isset($_POST['pseudo'])
	header("Location: minichat.php");
	echo "Le cookie a bien été crée";
}	
?>


<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Traitement des message - Minichat Version Amélioré</title>
	</head>

	<body>
		<!-- 
			Utilisé avec la page minichat.php pour le traitement des message: insertion + redirection page principal
		-->
		<?php
			try {
				$bdd = new PDO('mysql:hostname=localhost;dbname=mini_chat_v2;charset=utf8', 'root', '');
			}
			catch (Exception $e) {
				die("Exception: " .$e->getMessage());
			}

			// Insertion des messages saisis
			$req = $bdd->prepare('INSERT INTO chat(pseudo, date_ajout, message) VALUES (:pseudo, NOW(), :message)');
			$req->execute(array( 
				'pseudo' => $_POST['pseudo'],
				'message' => $_POST['message']
				));

			header('Location: minichat.php');
		?>
	</body>
</html>