<?php
	include "connect.php";                                                                                                                    //Nabil Aqila Putra
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
