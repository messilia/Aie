<?php
if (isset($_POST['btnadmin'])) {
    // récupérer les données du formulaire
    $code = $_POST['admincode'];
    $mdp = $_POST['adminmdp'];
    // récupérer les comptes de la base de données
    require("connexion.php");
    $compte = $myproject->query("SELECT code, mdp from administrateur");
    $existe = false;
    while ($tuple = $compte->fetch()) {
        if ($code == $tuple['code'] && $mdp == $tuple['mdp']) {
            $existe = true;
            break;
        }
    }
    if ($existe == true) {
        // Démarrer la session et définir la variable de session
        session_start();
        $_SESSION['admin_logged_in'] = true;
        header("location: dashboard.php");
    } else {
        header("location: login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login Page</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="login.php" method="post">
                <h1>Administrateur</h1>
                <span>Connectez vous en tant qu'Administrateur.</span>
                <input type="number" placeholder="code administrateur" name="admincode" required>
                <input type="password" placeholder="mot de passe" name="adminmdp" required>
                <!-- <a href="#">Mot de passe oublié</a> -->
                <button type="submit" name="btnadmin">Connexion</button>
            </form>
        </div>
        <div class="form-container sign-in">
            
            <form action="login.php" method="post">
                <h1>Enseignant</h1>
                <span>Connectez vous en tant qu'Enseignant.</span>
                <input type="email" placeholder="@univ-bejaia.dz" name="ensemail" required>
                <input type="password" placeholder="mot de passe" name="ensmdp" required>
                <button type="submit" name="btnens">Connexion</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Changer d'utilisateur</h1>
                    <p>Utilisez vos coordonnées personnelles pour vous connecter.</p>
                    <button class="hidden" id="login">Administrateur</button>
                </div>
                <div class="toggle-panel toggle-left">
                    <h1>Changer d'utilisateur</h1>
                    <p>Utilisez vos coordonnées personnelles pour vous connecter.</p>
                    <button class="hidden" id="register">Enseignant</button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/login.js"></script>
</body>

</html>