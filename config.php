<?php

// Informations de connexion à la base de données
$host = 'localhost';
$dbName = 'Employee';
$username = 'root';
$password = '';

// Connexion à la base de données
try {
    $db = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erreur de connexion à la base de données : ' . $e->getMessage()]);
    exit();
}
