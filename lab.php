<?php
   session_start();
   if(empty($_SESSION['username']))
    {
    header("location:index.php?pesan=belum_login");
    }

    include 'connect.php';
    //connect ke table lab
    $koneklab=mysqli_query($query,"SELECT * FROM lab ");   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body class=" bg-dark-subtle text-dark-emphasis">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Praktikum IF | 123230085 </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link" href="Home.php">Home</a>
            <a class="nav-link active" aria-current="page"  href="">Lab</a>
            <a class="nav-link" href="waktu.php">Waktu</a>
            <a class="nav-link" href="jadwal.php">Jadwal</a>
        </div>
        </div>
    </div>
    <span class="navbar-text me-3">
        <a class="nav-link" href="logout.php">
            Logout 
        </a>
    </span>
</nav>
<div class="container">
    <div class="row align-items-start mt-5">
    <div class="col w-75 me-2 ">
        <button type="button" class="button btn btn-dark">
            <a class="nav-link active " aria-current="page"  href="">Reload</a>
        </button>
        <table border=3 class="table table-striped-columns text-center">
            <thead>
                <tr>
                <td> No </td>
                <td> Lab </td>  
                <td> Action </td>  
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                //$koneklab=mysqli_query($query,"SELECT * FROM lab  ");
                while($data=mysqli_fetch_array($koneklab)){ ?>
                    <tr>
                    <td> <?php echo $no; ?></td>
                    <td> <?php echo $data['lab']; ?></td>
                    <td>
                    <button class="btn btn-outline-danger ">
                        <a href=delete_lab.php?id_lab=<?php echo $data['id_lab'];?> class="link-dark link-offset-2 link-underline link-underline-opacity-0">Hapus</a> 
                    </button>
                    </td>
                    <p> <?php $no = $no+1 ?></p>
                <?php }	?>
            </tbody>
        </table>
    </div>
    <div class="col w-50 ">
        <div class=" text-center">
            <h1>Input Data Lab </h1><br>
            <p>Masukkan Ruangan Lab  </p>
        </div>  
        <br>    
        <div>
            <form action="" method="post">
                <input type="text"  class="form-control" placeholder="Masukkan Nama Lab" name="lab" required><br>
                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-outline-secondary " name="submit" ></input>  
                </div>
            </form>
            <div class="text-center">
            <?php 
                if(isset($_POST['submit']) and $_POST['lab'] != "" ){
                    echo "Berhasil Membuat data Lab baru <br>";
                    $lab = $_POST['lab'];
                    $konekku=mysqli_query($query,"INSERT INTO lab VALUES('','$lab')") or die(mysqli_error($query));
                }
            ?>
            </div>
        </div>          
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>