<?php
   session_start();
   if(empty($_SESSION['username']))
{
    header("location:index.php?pesan=belum_login");
}
    include 'connect.php';
    //connect ke table lab
    $koneklab=mysqli_query($query,"SELECT * FROM lab ");   
     //connect ke table waktu
    $konekwkt=mysqli_query($query,"SELECT * FROM waktu ");
    //connect ke table jdwl
    $konekjdl=mysqli_query($query,"SELECT * FROM jadwal ");

    
?>

<!DOCTYPE html>
<!--123230085-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal</title>
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
            <a class="nav-link active" aria-current="page" href="">Jadwal</a>
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
    <div class="col w-75 me-2">
        <button type="button" class="button btn btn-dark">
            <a class="nav-link active " aria-current="page"  href="">Reload</a>
        </button>
        <table border=3 class="table table-striped-columns">
            <thead>
                <tr>
                <td> No </td>
                <td> MK Praktikum </td>
                <td> Jurusan </td>  
                <td> Lab </td>
                <td> Waktu </td>   
                <td> Action </td>  
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $konek=mysqli_query($query,"SELECT j.id_jadwal, j.mk, j.jurusan, l.lab, w.waktu_mulai, w.waktu_selesai FROM jadwal AS j INNER JOIN lab AS l ON j.id_lab = l.id_lab INNER JOIN waktu AS w ON j.id_waktu = w.id_waktu");
                while($data=mysqli_fetch_array($konek)){ ?>
                    <tr>
                    <td> <?php echo $no; ?></td>
                    <td> <?php echo $data['mk']; ?></td>
                    <td> <?php echo $data['jurusan']; ?> </td>
                    <td> <?php echo $data['lab']; ?></td>
                    <td> <?php echo $data['waktu_mulai'];  echo" - ";echo $data['waktu_selesai']; ?></td>
                    <td>
                    <a href=edit.php?id_jadwal=<?php echo $data['id_jadwal'];?>>Edit</a> | 
                    <a href=delete_jadwal.php?id_jadwal=<?php echo $data['id_jadwal'];?>>Hapus</a> 
                    </td>
                    <p> <?php $no = $no+1 ?></p>
                <?php }	?>
            </tbody>
        </table>
    </div>
    <div class="col w-50 ">
        <div class=" text-center">
            <h1>Input Jadwal Praktikum </h1><br>
            <p>Buatlah jadwal praktikum sesuai yang diinginkan </p>
        </div>  
        <br>    
        <div>
            <form action="" method="post">
                <input type="text"  class="form-control" placeholder="Masukkan MK Praktikum" name="mk" required><br>
                <!--Pilihan drop down untuk jurusan,jadwal,sama jam-->
                <div class="dropdown"">
                    <select name="jurusan" id="jurusan" class="lebar-select-jdl" >
                        <option value="" >Jurusan </option>
                        <option value="IF"> IF </option>
                        <option value="SI"> SI </option>
                    </select>
                </div>
                <div><br>
                    <select name="waktu" id="waktu" class="lebar-select-jdl">
                        <option value="" >Jam MK</option>
                        <?php
                            while($datawkt = mysqli_fetch_array($konekwkt)) {?>
                                <option value="<?php echo $datawkt['id_waktu']?>"> <?php echo $datawkt['waktu_mulai']; echo "-"; echo $datawkt['waktu_selesai']; ?> </option>
                        <?php }?>                   
                    </select>
                </div><br>
                <div>
                    <select name="lab" id="lab" class="lebar-select-jdl">
                        <option value="">Ruang Lab</option>
                        <?php
                            while($datalab = mysqli_fetch_array($koneklab)) {?>
                                <option value="<?php echo $datalab['id_lab']?>"> <?php echo $datalab['lab']; ?> </option>
                        <?php }?>
                    </select>
                </div>
                <br>
                <div class="d-grid gap-2 ">
                    <input type="submit" class="btn btn-outline-secondary" name="submit" ></input>  
                    <input type="reset" class="btn btn-outline-secondary" name="reset" ></input>  
                </div>
            </form>
            <div class="text-center">
                <?php 
                    if(isset($_POST['submit']) and $_POST['mk'] != "" and $_POST['jurusan'] != "" and $_POST['lab'] != "" and $_POST['waktu'] != "" ){
                        echo "Berhasil Membuat data baru <br>";
                        $mk = $_POST['mk'];
                        $id_lab = $_POST['lab'];
                        $jurusan = $_POST['jurusan'];
                        $id_waktu = $_POST['waktu'];
                        $konekku=mysqli_query($query,"INSERT INTO jadwal VALUES('','$mk','$jurusan','$id_lab','$id_waktu')") or die(mysqli_error($query));
                    }else if(isset($_POST['submit'])){
                        echo "<p style='text-align:center; color:red' > Mohon isi semua data</p> ";
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
