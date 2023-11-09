<?php
include_once("navbar.php");
?>
		<div class="container infoProduit">
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
