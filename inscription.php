<?php
require_once "includes/config_session.inc.php";
require_once "includes/inscrpt_view.inc.php";
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Inscription</h1>
        <form id="" action="includes/formhandler_inc.php" method="POST">
            <div class="champForm">
                <label for="lastName">Nom*</label>
                <input type="text" id="lastName" name="lastName">
                <span class="messageErreur" id="lastNameError"></span>
            </div>
            <div class="champForm">
                <label for="firstName">Prénom*</label>
                <input type="text" id="firstName" name="firstName">
                <span class="messageErreur" id="firstNameError"></span>
            </div>
            <div class="champForm">
                <label for="email">E-mail*</label>
                <input type="email" id="email" name="email">
                <span class="messageErreur" id="emailError"></span>
            </div>
            <div class="champForm">
                <label for="password">Mot de passe*</label>
                <input type="password" id="password" name="password">
                <span class="messageErreur" id="passwordError"></span>
            </div>
            <div class="champForm">
                <label for="confirmation">Confirmation du mot de passe*</label>
                <input type="password" id="confirmation" name="password_confirmation">
                <span class="messageErreur" id="confirmationError"></span>
            </div>
            <div class="champForm checkboxPart">
                <input type="checkbox" id="terms" name="terms">
                <label for="terms">J'accepte les conditions d'utilisation*</label>
                <span class="messageErreur" id="conditionsError"></span>
            </div>
            <button type="submit" value="submit" name="submit">S'inscrire</button>
            <?php
    check_signup_errors();
    ?>
        </form>
    </div>

    


    <!-- <script src="script.js"></script> -->
</body>

</html>