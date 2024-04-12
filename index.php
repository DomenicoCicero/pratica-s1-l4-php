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

$search = $_GET['search'] ?? '';


// selezione di tutte le righe dalla tabela
$stmt = $pdo->prepare('SELECT * FROM users WHERE username LIKE ?');
$stmt->execute([
    "%$search%"
])

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">USERS</h1>
    <div class="container">
    <form class="row g-3">
        <div class="col">
            <input type="text" name="search" class="form-control" placeholder="Cerca un utente">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Cerca</button>
        </div>
    </form>
    </div>
    <a href='http://localhost/pratica-s1-l4-php/add.php/' class="btn btn-primary my-3 ms-4">Add New User</a>
    <?php
     foreach ($stmt as $row) {
          echo "  <div class='card'>
    <div class='card-body'>
    <h2 class='card-title'>$row[username]</h2>
    <p class='card-text'><span class='fw-semibold'>Email: </span>$row[email]</p>
    <p class='card-text'><span class='fw-semibold'>Password: </span>$row[password]</p>
    <a href='http://localhost/pratica-s1-l4-php/details.php/?id=$row[id]' class='d-block'>Visualizza i dettagli</a>
    <a href='http://localhost/pratica-s1-l4-php/edit.php/?id=".urlencode($row['id'])."&username=".urlencode($row['username'])."&email=".urlencode($row['email'])."&password=".urlencode($row['password'])."' class='btn btn-warning mt-3'>Edit</a>
    <a href='http://localhost/pratica-s1-l4-php/delete.php/?id=".urlencode($row['id'])."&username=".urlencode($row['username'])."&email=".urlencode($row['email'])."&password=".urlencode($row['password'])."' class='btn btn-danger mt-3'>Elimina</a>

    </div> ";
    };
    ?>

<nav aria-label="Page navigation example text-center">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="http://localhost/pratica-s1-l4-php/pag1.php">1</a></li>
    <li class="page-item"><a class="page-link" href="http://localhost/pratica-s1-l4-php/pag2.php">2</a></li>
    <li class="page-item"><a class="page-link" href="http://localhost/pratica-s1-l4-php/pag3.php">3</a></li>
    <li class="page-item"><a class="page-link" href="http://localhost/pratica-s1-l4-php/pag4.php">4</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>