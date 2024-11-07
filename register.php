<?php 
require "connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Diri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> <!--tombol login-->
</head>
<body class="bdy-login bg-dark-subtle text-dark-emphasis"> 
        <div class="login-container ">
            <h2 class="login-header">Daftar Diri</h2>
            <p class="text-center">Silahkan Untuk Mendaftar</p>
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                </div>
                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary" name="reg_sub" >Register</input>               
                </div>
                <p class="text-center mt-3">Sudah Punya Akun? <a href="index.html">Login di Sini</a></p>
                
            </form>
            <?php
            if(isset($_POST['reg_sub'])){
                $username = $_POST['username'];
                $password = $_POST['password'];
                
                // menyeleksi data user dengan username dan password yang sesuai
                $data = mysqli_query($query,"select * from user where username='$username'")or die (mysqli_error($query));
                
                // menghitung jumlah data yang ditemukan
                $cek = mysqli_num_rows($data);
                
                if($cek > 0){
                    echo "<p style='text-align:center; color:red' >Username Sudah Terpakai</p>";
                }else{
                    echo '<script>alert("Berhasil Membuat Akun")</script>';
                    $konek=mysqli_query($query,"INSERT INTO user VALUES('','$username','$password')") or die(mysqli_error($query));
                    header("location:index.php");
                }
            }
            ?>
        </div>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>