<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars(string: $_POST['email']);
    $mot_de_passe = $_POST['mot_de_passe'];
    $confirmation = $_POST['confirmation'];

    // Vérification des mots de passe
    if ($mot_de_passe !== $confirmation) {
        $_SESSION['erreur'] = "Les mots de passe ne correspondent pas";
        header("Location: inscription.php");
        exit;
    }

    // Vérification de la longueur du mot de passe
    if (strlen($mot_de_passe) < 8) {
        $_SESSION['erreur'] = "Le mot de passe doit contenir au moins 8 caractères";
        header("Location: inscription.php");
        exit;
    }

    // Validation de l'email avec une expression régulière
    if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
        $_SESSION['erreur'] = "L'adresse email n'est pas valide";
        header("Location: inscription.php");
        exit;
    }

    try {

        // Vérification si l'email existe déjà
        $check = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $check->execute([$email]);

        if ($check->rowCount() > 0) {
            $_SESSION['erreur'] = "Cet email est déjà utilisé";
            header("Location: inscription.php");
            exit;
        }

        // Hachage du mot de passe
        $hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        // Insertion dans la base
        $stmt = $pdo->prepare("INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $email, $hash]);

        // Redirection vers la connexion
        $_SESSION['success'] = "Compte créé avec succès!";
        header("Location: connexion.php");
    } catch (PDOException $e) {
        die("Erreur d'inscription : " . $e->getMessage());
    }
}
