<?php require ("session.php"); ?>
<?php
try {
	$myproject = new PDO("mysql:host=localhost;dbname=myproject;charset=utf8", "root", "");
	$myproject->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die('<p style="color: red;">Erreur de connexion à la base de données : ' . $e->getMessage() . '</p>');
}
session_start();

if (isset($_POST['btnadmin'])) {
	// récupérer les données du formulaire
	$code = $_POST['code'];
	$mdp = $_POST['mdp'];
	// récupérer les comptes de la base de données

	$compte = $myproject->query("SELECT code, mdp from administrateur");
	$existe = false;
	while ($tuple = $compte->fetch()) {
		if ($code == $tuple['code'] && $mdp == $tuple['mdp']) {
			$existe = true;
			// initialiser la variable de session pour indiquer que l'administrateur est connecté
			$_SESSION['admin_logged_in'] = true;
			break;
		}
	}
	if ($existe) {
		header("location: profil.php");
		exit(); // assurez-vous de terminer le script après la redirection
	} else {
		header("location: login.php");
		exit(); // assurez-vous de terminer le script après la redirection
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">



	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="assets/css/profil.css">


	<title>Profil</title>
</head>

<body>


	<!-- SIDEBAR -->
	<section id="sidebar" class="hide">
		<a href="#" class="brand">
			<i class='bx bx-grid-alt'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="dashboard.php">
					<!-- <i class='bx bxs-dashboard' ></i> -->
					<i class='bx bx-stats'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="enseignant.php">
					<i class='bx bx-user'></i>
					<span class="text">Enseignants</span>
				</a>
			</li>
			<li>
				<a href="etudiant.php">
					<i class='bx bxs-group'></i>
					<span class="text">Etudiants</span>
				</a>
			</li>
			<li>
				<a href="salle.php">
					<i class='bx bxs-school'></i>
					<span class="text">Salles</span>
				</a>
			</li>
			<li>
				<a href="module.php">
					<i class='bx bx-file'></i>
					<span class="text">Modules</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="planning.php">
					<i class='bx bxs-cog'></i>
					<span class="text">Generation Planning</span>
				</a>
			</li>
			<li>
				<a href="session.php?logout=true" class="logout" onclick="return logoutConfirmation()">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Déconnexion</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<!-- <a href="#" class="nav-link">Categories</a> -->
			<form action="#">
				<!-- <div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div> -->
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell'></i>
				<!-- <span class="num">8</span> -->
			</a>
			<a href="#" class="profile">
				<i class='bx bx-user'></i>
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<section id="profil">
				<div class="head-title">
					<div class="left">
						<!-- <h1>Profil Administrateur</h1> -->
						<ul class="breadcrumb">
							<li>
								<a href="#">Dashboard</a>
							</li>
							<li><i class='bx bx-chevron-right'></i></li>
							<li>
								<a class="active" href="#">Profil</a>
							</li>
						</ul>
					</div>

				</div>
			</section>

			<!-- Profile -->

			<div class="container">
				<h1>Profil Administrateur</h1>
				<div class="profile-info">
					<h2>Informations</h2>
					<p><strong>Code :</strong> <?php echo $code; ?></p>
					<p><strong>Mot de passe :</strong> <?php echo $mdp ?></p>
				</div>
				<h1>Éditer le profil</h1>
				<div class="profile-edit">
					<form action="" method="post">
						<label for="edit-nom">Code:</label>
						<input type="text" id="edit-code" name="edit-code" value="<?php echo $admin_info['code']; ?>">
						<label for="edit-email">Mot de passe:</label>
						<input type="email" id="edit-mdp" name="edit-mdp" value="<?php echo $admin_info['mdp']; ?>">
						<button type="submit" name="edit_profile">Enregistrer</button>
					</form>
				</div>
				<form method="post" action="">
					<button type="submit" name="logout">Déconnexion</button>
				</form>
			</div>
			

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->



	<script>
		function logoutConfirmation() {
			if (confirm("Êtes-vous sûr de vouloir vous déconnecter ?")) {
				return true; // Si l'utilisateur confirme, la déconnexion se produit
			} else {
				return false; // Si l'utilisateur annule, la déconnexion est annulée
			}
		}
	</script>

	<script src="assets/js/profil.js"></script>
</body>

</html>


