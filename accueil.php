<?php
session_start();

// Vérification de la connexion
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit;
}

// Récupération des données de session
$nom = $_SESSION['nom'];
$prenom = $_SESSION['prenom'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Bienvenue <br> <?php echo $nom . ' ' . $prenom ?>!</h1>

        <a href="includes/deconnexion.php">Déconnexion</a>
    </div>
</body>

</html>