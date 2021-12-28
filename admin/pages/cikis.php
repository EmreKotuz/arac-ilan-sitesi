<?php session_start();

//çıkış yapma kodu
$_SESSION["girisKontrol"]=1;
unset($_SESSION["username"]);
header("Location: index.php?i=cikis");
session_destroy();


 ?>
