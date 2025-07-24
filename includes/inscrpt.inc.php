<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastName = $_POST["lastName"];
    $firstName = $_POST["firstName"];
    $email = $_POST["email"];
    $mot_passe = $_POST["password"];
    $mot_passe_confirmation = $_POST["password_confirmation"];



    // Hash du mot de passe 
    $mot_passe_hash = password_hash($mot_passe, PASSWORD_DEFAULT);

    try {
        require_once "dbh_inc.php";
        require_once "inscrpt_view.inc.php";
        require_once "inscrpt_contr.inc.php";

        // ERROR HANDLERS
    $errors = [];
    exit();


        if (is_input_empty($lastName, $firstName, $email, $mot_passe_hash, $mot_passe_confirmation)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (is_email_invalid($email)) {
            $errors["invalid_email"] = "Invalid email used !";
        }
        if (is_lastName_taken($pdo, $lastName)) {
            $errors["lastName_taken"] = "Last Name already taken!";
        }
        if(is_firstName_taken($pdo, $firstName)) {
            $errors["firstName_taken"] = "First Name already taken!";
        }
        if (is_email_registered( $pdo,  $email)) {
            $errors["email_used"] = "Email already registered!";
        }
        if(is_mot_passe_taken($pdo, $mot_passe_confirmation)) {
            $errors["pwd_taken"] = "Le mot de passe n'est pas sélectionné!";
        }

        require_once "config_session.inc.php";

        if($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("location: ../inscription.php");
            exit();
        }

        create_user();

    } catch (PDOException $e) {
        die("Erreur SQL : " . $e->getMessage());
    }
} else {
    header("location: ../inscription.php");
    exit();
}
