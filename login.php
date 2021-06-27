<?php
include("baglan.php");error_reporting(E_ALL ^ E_WARNING); 
ob_start();
session_start();
$kadi = $_POST['kadi'];
$sifre = $_POST['sifre'];
$sql_check = mysql_query($conn,"select * from kullanicilar where binary kullanici_adi='".$kadi."' and kullanici_sifre='".$sifre."' ") or die(mysql_error());
$isimcek=mysql_fetch_array(mysql_query($conn,$sql_check));
if(mysqli_num_rows($sql_check))  {
    $_SESSION["girisislemi"] = "true";
    $_SESSION["kuladi"] = $kadi;
    $_SESSION["kulsifre"] = $sifre;
	sleep(2);
    header("Location:admin.php");
}
else {
    header("Location:giris.php");
}
 
ob_end_flush();
?>