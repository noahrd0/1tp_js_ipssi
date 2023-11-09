<?php
include_once("navbar.php");
?>

    <div class="container">
        <div class="row">
            <div class="col-4">
                <h1>Connexion</h1>
                <form method="POST" action="">
                    <div class="form-group">
                            <label for="exampleInputEmail1">Votre adresse mail</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Entrez votre mot de passe</label>
                            <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe">
                        </div>
                        <br>
                    <button type="submit" class="btn btn-orange">Connexion</button>
                </form>
                <?php
    $connexion = new mysqli("localhost", "root", "", "velo");
    if ($connexion->connect_error) {
        die("Connection failed: " . $connexion->connect_error);
    }
                // Le formulaire a été soumis, continuer le traitement ici
                if (isset($_POST["email"]) && isset($_POST["mdp"])) {
                    $loginEmail = $_POST["email"];
                    $loginPassword = $_POST["mdp"];
                    if (!empty($loginEmail) && !empty($loginPassword)) {
                        $requete = "SELECT * FROM `user` WHERE `email` = '$loginEmail' AND `password` = '$loginPassword'";
                        $resultat = $connexion->query($requete);
                        $user = $resultat->fetch_assoc();
                        if ($user) {
                            echo "Bienvenue " . $user["email"];

                            if (session_status() == PHP_SESSION_NONE) {
                                session_start();
                            }
                            header('location: ./connexion.php');
                            $_SESSION["newsession"]=$user["email"];
                        } else {
                            echo "Mauvais identifiants";
                        }
                    }
                }
        ?>
            </div>
            <div class="col-6">
                <form>
                    <h1>Inscription</h1>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Entrez votre prénom</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Entrez votre Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Votre adresse mail</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Entrez votre mot de passe</label>
                        <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-orange">Inscription</button>
                </form>
            </div>
            <div class="col-4">
                <form method="POST" action="deco.php">
                    <h1>Deconnexion</h1>
                    <button type="submit" class="btn btn-orange">Deconnexion</button>
                </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
