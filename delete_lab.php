<?php
	include "connect.php";
	$id_lab	=$_GET['id_lab'];
	$konek=mysqli_query($query,"DELETE FROM lab where id_lab  = $id_lab");
    if(!$konek)
    {  //<!--123230085-->
        echo "Proses hapus Gagal";
    }
    else 
    {
        header("location:lab.php");
    }
?>
