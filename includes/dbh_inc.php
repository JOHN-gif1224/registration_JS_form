<?php
$dbhost = "localhost";
$dbname = "binary_sec_connexion";
$dbport = 5432;
$dbusername = "postgres";
$dbpassword = "UK2025";

$dsn = "pgsql:host=$dbhost;dbname=$dbname;port=$dbport";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<span style = 'color:blue; font-weight:bold;'>Connexion réussie à la base de donnée $dbname</span> <br>";
} catch (PDOException $e) {
    echo "<span style = 'color:red; font-weight:bold;'>Connexion échoué à la base de donnée $dbname </span> <br>";
    echo "Erreur: " . $e->getMessage();
}
