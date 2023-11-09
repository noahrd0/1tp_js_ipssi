<?php
include_once("navbar.php");
?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">id</th>
					<th scope="col">email</th>
					<th scope="col">prenom</th>
					<th scope="col">nom</th>
					<th scope="col">admin</th>
					<th scope="col">gerer</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$connexion = new mysqli("localhost", "root", "", "velo");
			if ($connexion->connect_error) {
				die("Connection failed: " . $connexion->connect_error);
			} else {
				$users = $connexion->query("SELECT * FROM user");
			}
		

			foreach ($users as $user) {
				echo "<tr>";
				echo "<td>{$user['id']}</td>";
				echo "<td>{$user['email']}</td>";
				echo "<td>{$user['prenom']}</td>";
				echo "<td>{$user['nom']}</td>";
				echo "<td>" . ($user['admin'] ? "Oui" : "Non") . "</td>";
				echo "<td><a href=\"#\" class=\"btn btn-primary btn-edit\">Edit</a></td>";
				echo "</tr>";
			}
			?>
				<td><a href="#" class="btn btn-primary" id="btn-add">Ajouter</a></td>
				<tr><td><a href="#" class="btn btn-danger" id="btn-del">Supprimer</a></td></tr>
			</tbody>
		</table>
	</div>
</body>
</html>
<script>
	let editButtons = document.querySelectorAll(".btn-edit");
	let newRow = null;

	editButtons.forEach(button => {
		button.addEventListener("click", () => {
			if (newRow !== null) {
				newRow.remove();
			}
			let currentRow = button.parentNode.parentNode;
			newRow = document.createElement("tr");
			let newCell = document.createElement("td");
			let newForm = document.createElement("form");
			newForm.setAttribute("action", "adminModif.php");
			newForm.setAttribute("method", "post");
			let content = `
				<input type="text" name="id" value="${currentRow.children[0].innerHTML}" readonly>
				<input type="text" name="email" placeholder="email">
				<input type="text" name="prenom" placeholder="prenom">
				<input type="text" name="nom" placeholder="nom">
				<select name="admin">
					<option value="0">Non</option>
					<option value="1">Oui</option>
				</select>
				<button type="submit" class="btn btn-primary" id="btn-save">Save</button>
			`;
			newForm.innerHTML = content;
			newCell.appendChild(newForm);
			newRow.appendChild(newCell);
			currentRow.after(newRow);
		});

		let btnAjouter = document.querySelector("#btn-add");
		btnAjouter.addEventListener("click", () => {
			if (newRow !== null) {
				newRow.remove();
			}
			newRow = document.createElement("tr");
			let newCell = document.createElement("td");
			let newForm = document.createElement("form");
			newForm.setAttribute("action", "adminAjout.php");
			newForm.setAttribute("method", "post");
			let content = `
				<input type="text" name="email" placeholder="email">
				<input type="text" name="prenom" placeholder="prenom">
				<input type="text" name="nom" placeholder="nom">
				<input type="text" name="password" placeholder="password no hash">
				<select name="admin">
					<option value="0">Non</option>
					<option value="1">Oui</option>
				</select>
				<button type="submit" class="btn btn-primary" id="btn-save">Confirmer</button>
			`;
			newForm.innerHTML = content;
			newCell.appendChild(newForm);
			newRow.appendChild(newCell);
			btnAjouter.after(newRow);
		});

		let btnSupprimer = document.querySelector("#btn-del");
		btnSupprimer.addEventListener("click", () => {
			if (newRow !== null) {
				newRow.remove();
			}
			newRow = document.createElement("tr");
			let newCell = document.createElement("td");
			let newForm = document.createElement("form");
			newForm.setAttribute("action", "adminDelete.php");
			newForm.setAttribute("method", "post");
			let content = `
				<input type="text" name="id" placeholder="id">
				<button type="submit" class="btn btn-danger" id="btn-delete">Confirmer</button>
			`;
			newForm.innerHTML = content;
			newCell.appendChild(newForm);
			newRow.appendChild(newCell);
			btnSupprimer.after(newRow);
		});
	});
</script>