<?php
	include "connect.php";
	$id_jadwal	=$_GET['id_jadwal'];
	$konek=mysqli_query($query,"DELETE FROM jadwal where 
                           id_jadwal=$id_jadwal");
    if(!$konek)
    {
        echo "Proses hapus Gagal";
    }
    else 
    {
        header("location:jadwal.php");
    }
?>