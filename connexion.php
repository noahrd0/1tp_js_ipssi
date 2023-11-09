<?php
include_once("navbar.php");
?>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <form>
                    <h1>Connexion</h1>
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
            </div>
            <div class="col-6">
                <form action="accesInscription.php" method="post">
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
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>