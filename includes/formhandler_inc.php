<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastName = $_POST["lastName"];
    $firstName = $_POST["firstName"];
    $email = $_POST["email"];
    $mot_passe = $_POST["password"];
    $mot_passe_confirmation = $_POST["password_confirmation"];

    // Vérification des champs obligatoires
    if (
        empty($lastName) || empty($firstName) || empty($email) ||
        empty($mot_passe) || empty($mot_passe_confirmation)
    ) {
        die("Tous les champs sont obligatoires.");
    }

    // Vérification de la confirmation du mot de passe
    if ($mot_passe !== $mot_passe_confirmation) {
        die("Les mots de passe ne correspondent pas.");
    }

    // Hash du mot de passe 
    $mot_passe_hash = password_hash($mot_passe, PASSWORD_DEFAULT);

    try {
        require_once "dbh_inc.php";
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO inscription (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?);";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$lastName, $firstName, $email, $mot_passe_hash]);
        $pdo = null;
        $stmt = null;
        header("location: ../index1.php?success=1");
        exit();
    } catch (PDOException $e) {
        die("Erreur SQL : " . $e->getMessage());
    }
} else {
    header("location: ../index1.php");
    exit();
}
