<!DOCTYPE html>
<html>

<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Connexion</h1>
        <?php if (isset($_SESSION['erreur'])): ?>
            <div class="erreur"><?= $_SESSION['erreur'] ?></div>
            <?php unset($_SESSION['erreur']); ?>
        <?php endif; ?>

        <form action="includes/traitement_connexion.php" method="post">
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Mot de passe:</label>
                <input type="password" name="mot_de_passe" required>
            </div>
            <button type="submit">Se connecter</button>
        </form>
        <p>Pas de compte? <a href="inscription.php">Inscrivez-vous</a></p>
    </div>
</body>

</html>