<?php
try {
    $myproject = new PDO("mysql:host=localhost;dbname=myproject;charset=utf8", "root", "");
    $myproject->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo ('<p style="color: green;">Connexion à la base de données réussie.</p>');
} catch (PDOException $e) {
    die('<p style="color: red;">Erreur de connexion à la base de données : ' . $e->getMessage() . '</p>');
}

// Préparation de la requête SQL
$sql = "SELECT * FROM user";

try {
    // Exécution de la requête SQL
    $stmt = $myproject->query($sql);
} catch (PDOException $e) {
    die('<p style="color: red;">Erreur lors de l\'exécution de la requête : ' . $e->getMessage() . '</p>');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/enseignant.css">
    <title>Enseignants</title>
</head>
<body>
    <!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
            <i class='bx bx-grid-alt'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li>
			    <a href="dashboard.php">
					<!-- <i class='bx bxs-dashboard' ></i> -->
                    <i class='bx bx-stats' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
			    <a href="enseignant.php">
                    <i class='bx bx-user'></i>
					<span class="text">Enseignants</span>
				</a>
			</li>
			<li>
				<a href="">
                    <i class='bx bxs-group' ></i>
					<span class="text">Etudiants</span>
				</a>
			</li>
			<li>
				<a href="">
                    <i class='bx bxs-school'></i>
					<span class="text">Salles</span>
				</a>
			</li>
			<li>
				<a href="">
                    <i class='bx bx-file'></i>
					<span class="text">Modules</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="">
					<i class='bx bxs-cog' ></i>
					<span class="text">Generation Planning</span>
				</a>
			</li>
			<li>
				<a href="index.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

    <section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<!-- <span class="num">8</span> -->
			</a>
			<a href="#" class="profile">
            <i class='bx bx-user' ></i>
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			
			<section id="dash">
			   <div class="head-title">
				<div class="left">
					<h1>Liste des Enseignants</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Enseignants</a>
						</li>
					</ul>
				</div>
			   </div>



			   <div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Enseignant</h3>
						<!-- <i class='bx bx-search' ></i> -->
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Identifiant</th>
								<th>Code</th>
								<th>Nom et Prenom</th>
								<th>Email</th>
								<th>Grade</th>
								<th>Modifier</th>
								<th>Suprimer</th>

							</tr>
						</thead>
						<tbody id="userTable">
						<?php
						    include('connection.php');
                            // Affichage des résultats dans le tableau
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['code']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['grade']) . "</td>";
                            // Ajoutez les liens pour la modification et la suppression si nécessaire
                            //echo "<td><a href='modifier.php?id=" . $row['id'] . "'>Modifier</a></td>";
                            //echo "<td><a href='supprimer.php?id=" . $row['id'] . "'>Supprimer</a></td>";
							//echo"<td><button '". $row['id'] . "'>Supprimer</button></td>"
							echo "<td><button (" . $row['id'] . ")'>Modifier</button></td>";
							echo "<td><button onclick='deleteUser(" . $row['id'] . ")'>Supprimer</button></td>";
                            echo "</tr>";
                        }
                        ?>
							<!-- <tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr> -->
						</tbody>
					</table>
				</div>
			   </div>
			   <script>
            function deleteUser(id) {
                if (confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?")) {
                    window.location.href = "supprimer.php?id=" + id;
                }
            }
        </script>

			</section>

			

           
	<script src="assets/js/enseignant.js"></script>


</body>
</html>
<!-- Insert into user values(345678987,'enseignant568','nome et prenom','ens@gmail.com','professeur'); -->
