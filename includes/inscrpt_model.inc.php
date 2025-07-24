<?php
declare(strict_types=1);

function get_lastName(PDO $pdo, string $lastName) {
    $query = "SELECT nom FROM inscriptions WHERE nom = :nom;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":nom", $lastName);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_firstName(PDO $pdo, string $firstName) {
    $query = "SELECT prenom FROM inscriptions WHERE prenom = :prenom;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":prenom", $firstName);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_mot_passe(PDO $pdo, string $mot_passe) {
    $query = "SELECT mot_passe FROM inscriptions WHERE mot_passe = :mot_passe;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":mot_passe", $mot_passe);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(PDO $pdo, string $email) {
    $query = "SELECT email FROM inscriptions WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

