<?php
/*
 * Traitement de la connexion
 * 1. Vérification des identifiants
 * 2. Comparaison du mot de passe haché
 * 3. Création de session
 */

session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $mot_de_passe = $_POST['mot_de_passe'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
            // Création de session
            $_SESSION['utilisateur_id'] = $utilisateur['id'];
            $_SESSION['nom'] = $utilisateur['nom'];
            $_SESSION['prenom'] = $utilisateur['prenom'];

            header("Location: accueil.php");
            exit;
        } else {
            $_SESSION['erreur'] = "Email ou mot de passe incorrect";
            header("Location: connexion.php");
            exit;
        }
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}
