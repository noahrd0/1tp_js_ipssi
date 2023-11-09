<?php
	if (isset($_POST["id"])) {
		$id = $_POST["id"];
		$email = $_POST["email"];
		$prenom = $_POST["prenom"];
		$nom = $_POST["nom"];
		$admin = $_POST["admin"];
	
		echo "email: " . $email . "<br>";
		echo "prenom: " . $prenom . "<br>";
		echo "nom: " . $nom . "<br>";
		echo "admin: " . $admin . "<br>";

		$connexion = new mysqli("localhost", "root", "", "velo");
		if ($connexion->connect_error) {
			die("Connection failed: " . $connexion->connect_error);
		} else {
			echo "Connexion réussie";
		}

		// Mettre à jour les informations de l'utilisateur dans la base de données
		$sql = "UPDATE user SET email='$email', prenom='$prenom', nom='$nom', admin='$admin' WHERE id=$id";
		if ($connexion->query($sql) === TRUE) {
			echo "Utilisateur mis à jour avec succès";
		} else {
			echo "Erreur lors de la mise à jour de l'utilisateur: " . $connexion->error;
		}

		// Fermer la connexion à la base de données
		$connexion->close();	
	} else {
		echo "id: non défini<br>";
	}
	
	header("location: admin.php");
?>


