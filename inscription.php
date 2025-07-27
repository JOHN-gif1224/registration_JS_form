<!DOCTYPE html>
<html>

<head>
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Créer un compte</h1>
        <form action="includes/traitement_inscription.php" method="post">
            <div class="form-group">
                <label>Nom:</label>
                <input type="text" name="nom" required>
                <span class="erreur-message" id="lastNameError"></span>
            </div>
            <div class="form-group">
                <label>Prénom:</label>
                <input type="text" name="prenom" required>
                <span class="erreur-message" id="firstNameError"></span>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
                <span class="erreur-message" id="emailError"></span>
            </div>
            <div class="form-group">
                <label>Mot de passe:</label>
                <input type="password" name="mot_de_passe" required>
                <span class="erreur-message" id="passwordError"></span>
            </div>
            <div class="form-group">
                <label>Confirmer le mot de passe: </label>
                <input type="password" name="confirmation" required>
                <span class="erreur-message" id="confirmPasswordError"></span>
            </div>
            <div class="form-group checkbox-group">
                <input type="checkbox" id="terms" name="terms">
                <label for="terms">J'accepte les conditions d'utilisation</label>
                <span class="erreur-message" id="termsError"></span>
            </div>
            <button type="submit">S'inscrire</button>
        </form>
        <p>Déjà inscrit? <a href="connexion.php">Connectez-vous</a></p>
    </div>
</body>
<script src="script.js"></script>

</html>