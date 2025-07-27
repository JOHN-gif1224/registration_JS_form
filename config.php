<?php
$dbhost = "localhost";
$dbname = "binary_connection";
$port = 5432;
$dbusername = "postgres";
$pwd = "UK2025";

$dsn = "pgsql:host=$dbhost;dbname=$dbname;port=$port";

try {
    $pdo = new PDO($dsn, $dbusername, $pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connexion réussie à la base de donnée <span style = 'color:blue;'>$dbname</span>";
} catch (PDOException $e) {
    echo "Connexion échoué à: <span style = 'color:blue;'>$dbname</span>";
    echo "<br>";
    echo $e->getMessage();
}
