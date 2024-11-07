<?php
   session_start();
   if(empty($_SESSION['username']))
{
    header("location:index.php?pesan=belum_login");
}

include 'connect.php';
    //connect ke table jadwal
    $id_jadwal=$_GET['id_jadwal'];
	$konek=mysqli_query($query,"SELECT j.id_jadwal, j.id_lab,j.mk, j.jurusan, l.lab, w.waktu_mulai, w.waktu_selesai, w.id_waktu FROM jadwal AS j INNER JOIN lab AS l ON j.id_lab = l.id_lab INNER JOIN waktu AS w ON j.id_waktu = w.id_waktu WHERE id_jadwal=$id_jadwal");
    $datajd =mysqli_fetch_array($konek);
    $lab_jdid = $datajd['id_jadwal'];
    $waktu_jdid = $datajd['id_jadwal'];
   //connect ke table lab
    $koneklab=mysqli_query($query,"SELECT * FROM lab ");
    
   //connect ke table waktu
    $konekwkt=mysqli_query($query,"SELECT * FROM waktu ");

    if(isset($_POST['submit'])){
        $mk = $_POST['mk'];
        $id_lab = $_POST['lab'];
        $jurusan = $_POST['jurusan'];
        $id_waktu = $_POST['waktu'];

        $konekku=mysqli_query($query,"UPDATE jadwal SET mk='$mk',jurusan='$jurusan',id_lab='$id_lab',id_waktu='$id_waktu' WHERE id_jadwal = '$id_jadwal' ") or die(mysqli_error($query));
        //header("location:jadwal.php");
        if(!$konekku){
            echo "<br> update gagal";
        }else{
            header("location:jadwal.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal</title>
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
            <a class="nav-link " href="Home.php">Home</a>
            <a class="nav-link" href="lab.php">Lab</a>
            <a class="nav-link" href="waktu.php">Waktu</a>
            <a class="nav-link active" aria-current="page" href="jadwal.php">Jadwal</a>
        </div>
        </div>
    </div>
    <span class="navbar-text me-3">
        <a class="nav-link" href="logout.php">
            Logout 
        </a>
    </span>
</nav>
<div class="position-relative">
    <div class="container mt-5 card" style="width: 50rem;">
        <div class="text-center" >
            <h1>Ubah Jadwal Praktikum</h1>
            <p>Buat jadwal praktikum sesuai dengan yang diinginkan</p><br><br>
        </div>
        <div class="card-body" >
            <form action="" method="POST">
                <input type="text" class="form-control" id="mk" name="mk" value="<?php echo $datajd['mk']; ?>" required><br>
                <!--Pilihan drop down untuk jurusan,jadwal,sama jam-->
                <div class="dropdown"">
                    <select name="jurusan" id="jurusan" class="lebar-select">
                        <option value="<?php echo $datajd['jurusan']?>">Jurusan Default</option>
                        <option value="IF"> IF </option>
                        <option value="SI"> SI </option>
                    </select>
                </div>
                <div><br>
                    <select name="waktu" id="waktu" class="lebar-select">
                        <option value="<?php echo $datajd['id_waktu']?>">Waktu Default</option>
                        <?php
                            while($datawkt = mysqli_fetch_array($konekwkt)) {?>
                                <option value="<?php echo $datawkt['id_waktu']?>"> <?php echo $datawkt['waktu_mulai']; echo "-"; echo $datawkt['waktu_selesai']; ?> </option>
                        <?php }?>                   
                    </select>
                </div><br>
                <div>
                    <select name="lab" id="lab" class="lebar-select">
                        <option value="<?php echo $datajd['id_lab']?>">Lab Default</option>
                        <?php
                            while($datalab = mysqli_fetch_array($koneklab)) {?>
                                <option value="<?php echo $datalab['id_lab']?>"> <?php echo $datalab['lab']; ?> </option>
                        <?php }?>
                    </select>
                </div>
                <br>


                <input type="submit" class="btn active" name="submit" ></input>  
                <input type="reset" class="btn active" name="reset" ></input>  
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>