<?php 
session_start();          // mengaktifkan session
session_destroy();       // menghapus semua session
 //<!--123230085-->
// mengalihkan halaman sambil mengirim pesan logout
header("location:index.php?pesan=logout");
?>
