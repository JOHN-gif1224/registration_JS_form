<!DOCTYPE html>
<html>

<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Créer un compte</h2>
        <form action="traitement_inscription.php" method="post">
            <div class="form-group">
                <label>Nom:</label>
                <input type="text" name="nom" required>
            </div>
            <div class="form-group">
                <label>Prénom:</label>
                <input type="text" name="prenom" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Mot de passe:</label>
                <input type="password" name="mot_de_passe" required>
            </div>
            <div class="form-group">
                <label>Confirmer le mot de passe:</label>
                <input type="password" name="confirmation" required>
            </div>
            <button type="submit">S'inscrire</button>
        </form>
        <p>Déjà inscrit? <a href="connexion.php">Connectez-vous</a></p>
    </div>
</body>

</html>