<?php
include_once("navbar.php");
?>
<link rel="stylesheet" href="./styleIndex.css">
<div class="search-container">
	<input type="text" id="search-bar" placeholder="Rechercher un produit...">
	<select name="tri" id="tri">
		<option value="default">Trier</option>
		<option value="croissant">Prix croissant</option>
		<option value="decroissant">Prix decroissant</option>
	</select>
	<span class="badge btn-orange fs-6" id="nb-produits">Produits</span>
</div>
    <div class="grid-container">
    	<div class="row"></div>
	</div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
<script defer>
	fetch('data.json')
	.then(response => response.json())
	.then(data => {
		let grid = document.querySelector('.row');
		let defaultOrder = data.slice(); // Copie du tableau de base pour pas tout casser
		let currentOrder = defaultOrder.slice(); // Current order devient une copie de defaultOrder

		function displayProducts(order) {
			grid.innerHTML = ''; // Clear de l'ancienne grille produit pour refaire l'affichage avec le trie
			for (let i = 0; i < order.length; i++) {
				grid.innerHTML += `<div class="col-md-3 col-sm-12"><div class="card-deck"><div class="card"><a href="informations.php?ref=${order[i].reference}"><img class="card-img-top img-thumbnail" src="${order[i].image}" alt="Card image cap"></a><div class="card-body"><span class="badge btn-orange fs-5">${order[i].prix}€</span><h5 class="card-title">${order[i].nom}</h5><p class="card-text">${order[i].description}</p><form method="POST" action="panier.php"><div class="input-group mb-3"><input type="number" class="form-control" placeholder="Quantité" aria-label="Quantité" aria-describedby="button-addon2"><button class="btn btn-outline-secondary" type="submit" id="button-addon2">Ajouter au panier</button></div></form></div></div></div></div>`;
			} // Affichage de la nouvelle grille
		}

		function sortPrixCroissant() {
			currentOrder = data.slice().sort((a, b) => a.prix - b.prix);
			displayProducts(currentOrder);
		}

		function sortPrixDecroissant() {
			currentOrder = data.slice().sort((a, b) => b.prix - a.prix);
			displayProducts(currentOrder);
		}

		function sortDefault() {
			currentOrder = defaultOrder.slice();
			displayProducts(currentOrder);
		}

		displayProducts(defaultOrder);

		// Recherche par nom
		let search = document.querySelector('#search-bar');
		search.addEventListener('keyup', (e) => {
			let searchString = e.target.value.toLowerCase();
			for (let i = 0; i < grid.children.length; i++) {
				let name = grid.children[i].querySelector('.card-title').innerText.toLowerCase();
				if (name.includes(searchString)) {
					grid.children[i].style.display = '';
				} else {
					grid.children[i].style.display = 'none';
				}
			}
		});

		// Recherche par prix
		let tri = document.querySelector('#tri');
		tri.addEventListener('change', (e) => {
			if (search.value !== '') {
				search.value = '';
			}
			let value = e.target.value;
			if (value === 'croissant') {
				sortPrixCroissant();
			} else if (value === 'decroissant') {
				sortPrixDecroissant();
			} else {
				sortDefault();
			}
		});

		let nbProduits = document.querySelector('#nb-produits');
		nbProduits.innerText += " " + data.length;

		// Plus d'info sur le produit au clic
		let cards = document.querySelectorAll('.card-deck');
		console.log(cards);
		cards.forEach(card => {
			card.addEventListener('click', (e) => {
				let name = card.querySelector('.card-title').innerText;
				let product = data.find(product => product.nom === name);
				console.log(product);
			});
		});
	});
</script>