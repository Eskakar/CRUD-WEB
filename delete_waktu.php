<?php
	include "connect.php";
	$id_waktu	=$_GET['id_waktu'];
	$konek=mysqli_query($query,"DELETE FROM waktu where 
                           id_waktu=$id_waktu");
    if(!$konek)
    {
        echo "Proses hapus Gagal";
    }
    else 
    {
        header("location:waktu.php");
    }
?>