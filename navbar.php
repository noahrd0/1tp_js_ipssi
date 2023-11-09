<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>
    <link rel="stylesheet" href="./style/styleIndex.css">
  <link href="./style/informations.css" rel="stylesheet">
   
    <body>
    <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
    ?>
    <nav class="navbar navbar-expand-md navbar-light bg-light" aria-label="Fourth navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="./images/logo-PhotoRoom.png-PhotoRoom.png" class="img-fluid" alt="" width="75" height="75"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
 
      <div class="collapse navbar-collapse" id="navbarsExample04">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="produit.php">Produit</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="connexion.php">Compte</a>
            </li>
            <li class="nav-item">
        <button type="button" id="DarkLight" class="btn btn-dark">Noir</button>
        </li>
        <li class="nav-item">
                            <a class="nav-link" href=connexion.php> <?php
                                // verification pour eviter d'afficher le message d'erreur php
                                
                                if (isset($_SESSION["newsession"])) {
                                    echo "Connecté ( " . $_SESSION["newsession"] . " )";
                                } else {
                                    echo "Deconnecté";
                                }
                                ?>
                            </a>
                        </li>
                        <?php
                            // Verifier si l'utilisateur connecté est un admin dans la base de données
                            $connexion = new mysqli ("localhost", "root", "", "velo");
                            if ($connexion->connect_error) {
                                die("Connection failed: " . $connexion->connect_error);
                            }
                            
                            $userEmail = $_SESSION["newsession"];
                            // $requeteIsAdmin = $connexion->prepare($connexion, "SELECT * FROM `user` WHERE `email` = ?");
                            // $requeteIsAdmin->bind_param("s", $userEmail);
                            // $requeteIsAdmin->execute();
                            // echo $requeteIsAdmin->get_result();
                            // $requeteIsAdmin->close();
                            $requete = "SELECT * FROM `user` WHERE `email` = '$userEmail' AND `admin` = 1";
                            $resultat = $connexion->query($requete);
                            foreach ($resultat as $key => $value) {
                                if ($value["admin"] == 1) {
                                    echo "<li class='nav-item'>
                                    <a class='nav-link' href='admin.php'>Admin</a>
                                    </li>";
                                }
                            }
                        ?>
        </ul>
      </div>
    </div>
  </nav>