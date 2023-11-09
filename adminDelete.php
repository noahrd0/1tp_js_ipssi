<?php
if (isset($_POST["id"])) {
			$id = $_POST["id"];
	
			$connexion = new mysqli("localhost", "root", "", "velo");
			if ($connexion->connect_error) {
				die("Connection failed: " . $connexion->connect_error);
			} else {
				echo "Connexion réussie";
			}
	
			// Supprimer l'utilisateur de la base de données
			$sql = "DELETE FROM user WHERE id=$id";
			if ($connexion->query($sql) === TRUE) {
				echo "Utilisateur supprimé avec succès";
			} else {
				echo "Erreur lors de la suppression de l'utilisateur: " . $connexion->error;
			}
            $connexion->close();
		} else {
			echo "id: non défini<br>";
		}

        header("location: admin.php");
?>