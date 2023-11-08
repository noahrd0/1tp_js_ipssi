<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styleIndex.css" rel="stylesheet">
		<link href="style/informations.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Bycycle</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="images/logo-PhotoRoom.png-PhotoRoom.png" alt="" width="75" height="75"></a>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="nav-link" href="index.html">Accueil</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="produit.html">Produit</a>
                </li>
            </ul>
            </div>
        </nav>
		<div class="container">
			<?php
				// Récupération des informations pour l'affichage detaille
				$ref = $_GET['ref'];
				$products = json_decode(file_get_contents('data.json'), true);
				$product = null;
				foreach ($products as $p) {
					if ($p['reference'] === $ref) {
						$product = $p;
						break;
					}
				}
				if ($product !== null) {
					echo '<div class="image">';
					echo '<img class="card-img-top img-thumbnail" src="' . $product['image'] . '" alt="' . $product['nom'] . '" style="width: 1000px; height: auto;" />';
					echo '</div>';
					echo '<div class="infos">';
					echo '<h1>' . $product['nom'] . '</h1>';
					echo '<p>' . $product['description'] . '</p>';
					echo 'Prix : <span class="badge btn-orange fs-5">'. $product['prix'] . '€</span>';
					echo '<p>Reference : ' . $product['reference'] . '</p>';
					echo '<p>' . $product['info'] . '</p>';
					echo '<p>Couleur : ' . $product['couleur'] . '</p>';
					echo '<button class="btn btn-outline-secondary" type="button" id="button-addon2">Ajouter au panier</button>';
					echo '</div>';
				} else {
					echo 'Produit non trouvé';
				}
			?>
		</div>
    </body>
</html>
