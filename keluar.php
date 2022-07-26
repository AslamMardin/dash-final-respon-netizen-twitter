<?php 
session_start();
unset($_SESSION['masuk']);
unset($_SESSION['nama']);
unset($_SESSION['id']);
setcookie('pesan', 'Berhasil Log Out', time() + 10);
header('Location:login.php');
 ?>