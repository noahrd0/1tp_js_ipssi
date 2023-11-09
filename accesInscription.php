<?php
$conn = new mysqli("localhost", "root", "", "velo");
//  Vérification de la connexion
if($conn->connect_error){
    die('Erreur : ' .$conn->connect_error);
}
echo 'Connexion réussie';

$inscriptionPrenom = $_POST["prenom"];
$inscriptionNom = $_POST["nom"];
$inscriptionEmail = $_POST["email"];
$inscriptionMdp = $_POST["mdp"];

if (!empty($inscriptionEmail) && !empty($inscriptionMdp) && !empty($inscriptionPrenom) && !empty($inscriptionNom)) {

    $verifEmail = "SELECT email FROM user";
    $resultEmail = $conn->query($verifEmail);
        foreach ($resultEmail as $mail) {
            if ($inscriptionEmail == $mail["email"]) {
            echo "Cette adresse email est déjà utilisé";
            header("location: connexion.php");
            }
        }
    $inscriptionhash = password_hash("$inscriptionMdp", PASSWORD_BCRYPT);
    $requeteInscription = "INSERT INTO user(prenom, nom, email, `password`) VALUES (?,?,?,?)";
    $result = $conn->prepare($requeteInscription);
    $result->bind_param("ssss", $inscriptionPrenom, $inscriptionNom, $inscriptionEmail, $inscriptionhash);
    $result->execute();
    header("location: index.php");
}
?>