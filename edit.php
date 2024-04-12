<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
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
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// selezione di tutte le righe dalla tabela
$stmt = $pdo->prepare("UPDATE users SET username = :newusername, email = :newemail, password = :newpassword WHERE id = :id");
$stmt->execute([
    'id' => $id,
    'newusername' => $username,
    'newemail' => $email,
    'newpassword'=> $password,
]);
header('Location: ' . 'http://localhost/pratica-s1-l4-php/');
exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="text-center">
    <h1 class="text-center">Add New Users</h1>
    <form action="" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required value=<?=$_GET['username'] ?>><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required value=<?=$_GET['email'] ?>><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required value=<?=$_GET['password'] ?>><br><br>

        <button type="submit" class="btn btn-primary">Add</button>

        <!-- <input type="submit" value="Registrati"> -->
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>