<?php
// config.php
session_start();

$host = 'localhost';
$dbname = 'plant_db';
$username = 'root'; // usuário padrão do XAMPP
$password = ''; // senha padrão do XAMPP é vazia

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>