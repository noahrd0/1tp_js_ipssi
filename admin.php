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
			$users = [
				["id" => 1, "email" => "john.doe@example.com", "prenom" => "John", "nom" => "Doe", "admin" => true],
				["id" => 2, "email" => "jane.doe@example.com", "prenom" => "Jane", "nom" => "Doe", "admin" => false],
				["id" => 3, "email" => "bob.smith@example.com", "prenom" => "Bob", "nom" => "Smith", "admin" => false],
				["id" => 4, "email" => "alice.johnson@example.com", "prenom" => "Alice", "nom" => "Johnson", "admin" => true],
			];

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
			<span class=test></span>
				<td><a href="#" class="btn btn-primary" id="btn-add">Ajouter</a></td>
			</tbody>
		</table>
	</div>
</body>
</html>
<script>
	let allButtons = document.querySelectorAll(".btn-edit");
	let newRow = null;

	allButtons.forEach(button => {
		button.addEventListener("click", () => {
			if (newRow !== null) {
				newRow.remove();
			}
			let currentRow = button.parentNode.parentNode;
			newRow = document.createElement("tr");
			let newCell = document.createElement("td");
			let newForm = document.createElement("form");
			newForm.setAttribute("action", "traitementAdmin.php");
			newForm.setAttribute("method", "post");
			let content = `
				<input type="text" name="email" placeholder="email">
				<input type="text" name="prenom" placeholder="prenom">
				<input type="text" name="nom" placeholder="nom">
				<select name="admin">
					<option value="0">Non</option>
					<option value="1">Oui</option>
				</select>
				<button type="submit" class="btn btn-primary" id="btn-save">Save</button>
				<button type="button" class="btn btn-danger" id="btn-delete">Delete</button>
				<button type="button" class="btn btn-secondary" id="btn-cancel">Cancel</button>
			`;
			newForm.innerHTML = content;
			newCell.appendChild(newForm);
			newRow.appendChild(newCell);
			currentRow.after(newRow);
		});
	});
</script>