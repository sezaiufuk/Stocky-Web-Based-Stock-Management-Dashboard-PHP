<?php
$conn=mysqli_connect('us-cdbr-east-04.cleardb.com','be20445e4bb0f1','c278bcc1')or die("Bağlantı Kurulamadı"); //Veritabanı Giriş Bilgileri
mysqli_select_db($conn,'heroku_24e188829672d17')or die('Veritabanı Bulunamadı');
mysqli_query($conn,"SET NAMES 'utf8'  ");
mysqli_query($conn,"SET CHARACTER SET utf8");
mysqli_query($conn,"SET COLLATION_CONNECTION = 'utf8_turkish_ci' ");
$sql="select * from urunler order by urun_adi ASC";
	$result=mysqli_query($conn,$sql);
	echo mysqli_error($conn);
$numrows=mysqli_num_rows($result);
$toplamkazancsorgu = mysqli_query($conn,"SELECT SUM(urun_fiyat) as toplam FROM urunler");  
  $toplamkazanc=mysqli_fetch_array($toplamkazancsorgu);
$toplamurunsorgu = mysqli_query($conn,"SELECT SUM(urun_adet) as toplamurun FROM urunler");  
  $toplamurun=mysqli_fetch_array($toplamurunsorgu); 
$kazancsart="₺";
	if($toplamkazanc['toplam']<1){
		$kazancsart="0₺";
	}
	if($toplamurun['toplamurun']<1){
		$toplamurun['toplamurun']=0;
	}
$kalanadet=mysqli_query($conn,"SELECT * FROM urunler WHERE urun_adet BETWEEN '1' AND '4' ORDER BY urun_adet ASC ");
$numrowsadet=mysqli_num_rows($kalanadet);
if($numrowsadet>=6){
	$scrollkomutu="max-height:300px;overflow: auto;";
}
mysqli_query($conn,"DELETE FROM kullanici_mesajlari WHERE zaman<=DATE_SUB(NOW(), INTERVAL 1 DAY)");
mysqli_query($conn,"DELETE FROM yonetici_mesajlari WHERE zaman<=DATE_SUB(NOW(), INTERVAL 1 DAY)");
mysqli_query($conn,"DELETE FROM eleman_mesajlari WHERE zaman<=DATE_SUB(NOW(), INTERVAL 1 DAY)");
?>