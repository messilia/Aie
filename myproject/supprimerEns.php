
<?php
// Vérifie si l'identifiant de l'utilisateur à supprimer est présent dans l'URL
if (isset($_GET['nom']) && !empty($_GET['nom'])) {
    try {
        $myproject = new PDO("mysql:host=localhost;dbname=myproject;charset=utf8", "root", "");
        $myproject->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Vérifie si l'enseignant est associé à des modules
        $stmt_check_modules = $myproject->prepare("SELECT COUNT(*) AS count FROM module WHERE charge_module = :nom");
        $stmt_check_modules->bindParam(':nom', $_GET['nom']);
        $stmt_check_modules->execute();
        $row_check_modules = $stmt_check_modules->fetch(PDO::FETCH_ASSOC);

        if ($row_check_modules['count'] > 0) {
            // Affiche une boîte de dialogue avec un message d'erreur si l'enseignant est associé à des modules
            echo '<script>alert("Erreur : Cet enseignant est actuellement chargé de modules et ne peut pas être supprimé."); window.location.href = "enseignant.php";</script>';
            exit();
        } else {
            // Affiche une boîte de dialogue de confirmation avant la suppression
            echo '<script>
                    if (confirm("Voulez-vous vraiment supprimer cet enseignant ?")) {
                        window.location.href = "supprimerEns.php?nom=' . $_GET['nom'] . '";
                    } else {
                        window.location.href = "enseignant.php";
                    }
                </script>';
            exit();
        }
    } catch (PDOException $e) {
        die('<p style="color: red;">Erreur lors de la suppression de l\'utilisateur : ' . $e->getMessage() . '</p>');
    }
} else {
    // Si l'identifiant de l'utilisateur n'est pas présent dans l'URL, redirige vers la page des enseignants
    header("Location: enseignant.php");
    exit();
}
?>
