<?php
$host = 'localhost';
$db = 'praticas1l3';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// comando che connette al db
$pdo = new PDO($dsn, $user, $pass, $options);

$id = $_GET['id'] ?? '';

// selezione di tutte le righe dalla tabela
$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([
    $id,
]);
header('Location: ' . 'http://localhost/pratica-s1-l4-php/');
exit;
?>