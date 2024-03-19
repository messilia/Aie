<?php
if (isset($_POST[''])) {
    header("location:index.php");
}    
?>
<!-- http://localhost/project/dashboard.php -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	
    
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="assets/css/dashboard.css">
	

	<title>Dashboard</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
            <i class='bx bx-grid-alt'></i>
			<span class="text">Admin</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="dashboard.php">
					<!-- <i class='bx bxs-dashboard' ></i> -->
                    <i class='bx bx-stats' ></i>
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
			    <a href="" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
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
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				
			   </div>

			   <ul class="box-info">
				<li>
                    <i class='bx bxs-user-detail'></i>
					<span class="text">
						<h3>1020</h3>
						<p>Nombre d'enseignant</p>
					</span>
				</li>
				<li>
                    <i class='bx bxs-graduation'></i>
					<span class="text">
						<h3>22334</h3>
						<p>Nombre de diplômés</p>
					</span>
				</li>
				<li>
                    <i class='bx bxs-school'></i>
					<span class="text">
						<h3>2543</h3>
						<p>Nombre de salles</p>
					</span>
				</li>
			  </ul>


			   <div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Statistiques</h3>
						<!-- <i class='bx bx-search' ></i> -->
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>User</th>
								<th>Date Order</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status completed">Completed</span></td>
							</tr>
							<tr>
								<td>
									
									<p>John Doe</p>
								</td>
								<td>01-10-2021</td>
								<td><span class="status pending">Pending</span></td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- <div class="todo">
					<div class="head">
						<h3>Todos</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="todo-list">
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
						<li class="not-completed">
							<p>Todo List</p>
							<i class='bx bx-dots-vertical-rounded' ></i>
						</li>
					</ul>
				</div> -->
			   </div>
			</section>
			
			
			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->





	<script src="assets/js/dashboard.js"></script>
</body>
</html>
