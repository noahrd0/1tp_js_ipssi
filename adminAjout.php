<?php
    	$email = $_POST["email"];
		$prenom = $_POST["prenom"];
		$nom = $_POST["nom"];
        $password = $_POST["password"];
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

        // Hash du mot de passe

        $password = password_hash("$password", PASSWORD_BCRYPT);

        // Ajouter un nouvel utilisateur dans la base de données
        $sql = "INSERT INTO user (email, prenom, nom, password, admin) VALUES ('$email', '$prenom', '$nom', '$password', '$admin')";
        if ($connexion->query($sql) === TRUE) {
            echo "Nouvel utilisateur créé avec succès";
        } else {
            echo "Erreur lors de la création de l'utilisateur: " . $connexion->error;
        }

		// Fermer la connexion à la base de données
		$connexion->close();	
	
	header("location: admin.php");
?>


