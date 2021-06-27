<?php
include("baglan.php");
if(isset($_POST['kayitBtn'])){
$kayitkod=strtoupper($_POST['kayitkod']);
$kayitkuladi=$_POST['kayitkuladi'];
$kayitsifre=$_POST['kayitsifre'];
$kayitkulisimi=strtoupper($_POST['kayitkulisimi']);
$kayitkulsoyadi=strtoupper($_POST['kayitsoyadi']);
$kayitkuladresi=$_POST['kayitadres'];
$kayitkodusorgu=mysqli_fetch_array(mysqli_query($conn,"select eleman_kayit_kodu,yonetici_kayit_kodu from ayarlar"));
								
             if($kayitkod==$kayitkodusorgu[0]){
				 $kayitekle=mysqli_query($conn,"INSERT INTO kullanicilar (kullanici_adi,kullanici_sifre,kullanici_ismi,kullanici_soyadi,kullanici_adresi,kullanici_yetkisi)
VALUES ('$kayitkuladi','$kayitsifre','$kayitkulisimi','$kayitkulsoyadi','$kayitkuladresi','Eleman')");
				header("Location:giris.php");
             }
			if($kayitkod==strtoupper($kayitkodusorgu[1])){
				$kayitekley=mysqli_query($conn,"INSERT INTO kullanicilar (kullanici_adi,kullanici_sifre,kullanici_ismi,kullanici_soyadi,kullanici_adresi,kullanici_yetkisi)
				VALUES ('$kayitkuladi','$kayitsifre','$kayitkulisimi','$kayitkulsoyadi','$kayitkuladresi','Yönetici')");
				header("Location:giris.php");
			}
			else{
                echo mysqli_error();
            }
        }
    ?>