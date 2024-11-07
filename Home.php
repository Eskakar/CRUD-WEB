<?php
   session_start();
   if(empty($_SESSION['username']))
{
    header("location:index.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class=" bg-dark-subtle text-dark-emphasis">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Praktikum IF | 123230085 </a>
        
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
        </div>
        </div>
    </div>
    <span class="navbar-text me-3">
        <a class="nav-link" href="logout.php">
            Logout 
        </a>
    </span>
</nav>
<div class="container mt-5 box">    
    <h5>Selamat Datang di</h5>
    <h1>Lab Informatika</h1>
    <br><br>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a class="btn btn-outline-secondary" href="lab.php">Lab</a>
        <a class="btn btn-outline-secondary" href="waktu.php">Waktu Praktikum</a>
        <a class="btn btn-outline-secondary" href="jadwal.php">Jadwal Praktikum</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>