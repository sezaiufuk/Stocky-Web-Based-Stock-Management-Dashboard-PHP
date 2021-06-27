<?php include("baglan.php");
ob_start();
session_start();
if(!isset($_SESSION["girisislemi"])){
    header("Location:giris.php");
}
include("header.php");$length = 6;
								$randomcode   = (strtoupper(substr(md5(time()), 0, $length)));
$kulbilgicek=mysqli_query($conn,"SELECT kullanici_ismi,kullanici_soyadi,kullanici_yetkisi,kullanici_adresi FROM kullanicilar WHERE kullanici_adi ='{$_SESSION['kuladi']}'");
$kullaniciarray=mysqli_fetch_array($kulbilgicek);
if($kullaniciarray[2]=="Eleman"){
	echo "<style>.yetkiselayar{display:none;}</style>";
}
?>
<style>#active2 a{background-color:#9c27b0 !important;color:#FFFFFF !important;}
	#active2 i{color:white !important;}.readycode{color:#868686;cursor:not-allowed;}
</style>
 <a class="navbar-brand" href="#" style="margin-left:1.3em;border-bottom:#CCC solid 1px;color:#363636;"> Ürün İşlemleri & Ayarlar </a>
 <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Ürün Ekleme</h4>
                                    <p class="category">Buradan Ürün Ekleyebilirsiniz</p>
                                </div>
                                <div class="card-content">
                                           <form method="POST" action="urunislemleri.php">
                                        <div class="row">
                                           <div class="col-md-2 col-xs-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Ürün Kodu</label>
                                                    <input type="text" class="form-control readycode" name="urunkodu" readonly value="<?php echo $randomcode;?>">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4 col-xs-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Ürün Adı</label>
                                                    <input type="text" class="form-control" name="urunadi" maxlength="52"  onkeyup="this.value = this.value.turkishToUpper();" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Ürün Adet</label>
                                                    <input type="number" class="form-control" name="urunadet" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Ürün Fiyat</label>
                                                    <input type="number" class="form-control" name="urunfiyat" step="0.01" required>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <button type="submit" class="btn btn-primary col-md-12 col-xs-12" name="form1">Değişiklikleri Kaydet</button>
       								 <?php 
								
										
        								if(isset($_POST['form1'])){
            								$urunkodu_ekle=$_POST["urunkodu"];
            								$urunadi_ekle=strtoupper($_POST["urunadi"]);
            								$urunadet_ekle=$_POST["urunadet"];
            								$urunfiyat_ekle=$_POST["urunfiyat"];
            					
											
$aynivarmi = mysqli_query($conn,"select urun_adi from urunler where urun_adi='$urunadi_ekle'");
								
            // Sorun Oluştu mu diye test edelim. Eğer sorun yoksa hata vermeyecektir
             if(mysqli_num_rows($aynivarmi)==0){
				 $ekle=mysqli_query($conn,"insert into urunler (urun_kodu,urun_adi,urun_adet,urun_fiyat) VALUES ('$urunkodu_ekle','$urunadi_ekle','$urunadet_ekle','$urunfiyat_ekle')");
                			echo "<script>
									swal({
  									title: 'Ürün Eklendi',
  									text: \"$urunadet_ekle adet $urunadi_ekle\",
  									icon: \"success\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";
				
				
            }else{
                			echo "<script>
									swal({
  									title: 'Ürün Eklenemedi',
  									text: \"Bu Ürün Zaten Kayıtlı Olabilir!\",
  									icon: \"error\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";
            }
        }
    ?>
                                      
                                       
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
    <!----------------------------------------------------->
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Ürün Silme</h4>
                                    <p class="category">Buradan Ürün Silebilirsiniz</p>
                                </div>
                                 <div class="card-content">
                                           <form method="POST" action="urunislemleri.php">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Silinecek Ürünün Kodu</label>
                                                    <input type="text" class="form-control" name="urunkodu_sil" id="cmd1" maxlength="6" style="text-transform:uppercase" required>
                                                </div>
                                            </div>
                                            </div>
      <button type="submit" class="btn btn-primary col-md-12 col-xs-12" name="form2">Değişiklikleri Kaydet</button>
       								 <?php 
        								if(isset($_POST['form2'])){
            								$urunkodu_sil=$_POST["urunkodu_sil"];
            		$benzervar=mysqli_num_rows(mysqli_query($conn,"SELECT urun_adi FROM urunler WHERE urun_kodu='$urunkodu_sil'"));
            if($benzervar>0){
							  echo "<script>
									swal({
  									title: 'Ürün Silindi',
  									text: \" \",
  									icon: \"success\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";
				$sil=mysqli_query($conn,"delete from urunler WHERE urun_kodu='$urunkodu_sil'");
            }
			else{
                			  echo "<script>
									swal({
  									title: 'Ürün Silinemedi',
  									text: \"Girdiğiniz Ürün Kodu Yanlış Olabilir!\",
  									icon: \"error\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";
            }
				
        }
    ?>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                            
                       
                        <!---------------------------------------------------->
                        <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Ürün Düzenleme</h4>
                                    <p class="category">Buradan Ürün Verilerini Düzenleyebilirsiniz.</p>
                                </div>
                                <div class="card-content">
                                           <form method="POST" action="urunislemleri.php">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Ürün Kodu</label>
                                                    <input type="text" class="form-control" name="urunkodpost" maxlength="6" required onkeyup="this.value = this.value.turkishToUpper();">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Ürün Adı</label>
                                                    <input type="text" class="form-control" name="urunadipost" maxlength="52" onkeyup="this.value = this.value.turkishToUpper();" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Ürün Adet</label>
                                                    <input type="number" class="form-control" name="urunadetpost" required>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-3 col-xs-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Ürün Fiyat</label>
                                                    <input type="number" class="form-control" name="urunfiyatipost" step="0.01" required>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                        
                                        <button type="submit" class="btn btn-primary col-md-12 col-xs-12" name="form3">Düzenlemeyi Kaydet</button>
       								 <?php 
        								if(isset($_POST['form3'])){
											 $updatead =strtoupper($_POST['urunadipost']);
 $updateadet = $_POST['urunadetpost'];
 $updatefiyat = $_POST['urunfiyatipost'];
 $updatekod = $_POST['urunkodpost'];
$kontrol=mysqli_num_rows(mysqli_query($conn,"SELECT urun_adi FROM urunler WHERE urun_kodu='$updatekod'"));

//güncelleme için SQL sorgumuzu yazıyoruz.
$aynivarmiduzen = mysqli_query($conn,"select urun_adi from urunler where urun_adi='$updatead' and urun_adet='$updateadet' and urun_fiyat='$updatefiyat'");
if($kontrol>0) 
{ 
	if(mysqli_num_rows($aynivarmiduzen)==0){
$sqlguncelle = mysqli_query($conn,"UPDATE urunler SET urun_adi='$updatead', urun_adet='$updateadet',urun_fiyat='$updatefiyat' WHERE urun_kodu='$updatekod' ") or die(mysqli_error());
							  echo "<script>
									swal({
  									title: 'Ürün Bilgisi Değiştirildi',
  									text: \"Ürün Adı:$updatead Adeti:$updateadet \",
  									icon: \"success\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";}
	else{
							  echo "<script>
									swal({
  									title: 'Ürün Bilgisi Değiştirilemedi',
  									text: \"Bilgilerde Hiçbir Değişiklik Yapmadınız!\",
  									icon: \"error\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";
	}
				

}
else{
							  echo "<script>
									swal({
  									title: 'Ürün Bilgisi Değiştirilemedi',
  									text: \"Kod Hatalı Olabilir!\",
  									icon: \"error\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";}
				
        }
    ?>
                                       
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="content">
                                    <h6 class="category text-gray"><?php echo $kullaniciarray[2];?></h6>
                                    <h4 class="card-title"><?php echo $kullaniciarray[0]." ".$kullaniciarray[1];?></h4>

                                    <a href="cikis.php" class="btn btn-primary btn-round"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Çıkış Yap</a>
                                </div>
                            </div>
                        </div>
                                <div class="col-md-4 yetkiselayar">
                            <div class="card card-profile">
                                <div class="content">
                                    <h4 class="card-title">Depo Limiti</h4>
                                    <div class="col-md-12">
                                               <?php
												$depolimit=mysqli_fetch_array(mysqli_query($conn,"select depo_limiti from ayarlar"));
												?>
                                                <div class="form-group label-floating" style="margin-top:-4px;">
                                                    <form action="urunislemleri.php" method="post">
                                   <input type="number" class="form-control" name="depolimitipost" placeholder="<?php echo $depolimit[0] ?>" style="font-size:18px;text-align:center;" id="cmd" required>
                                   <button type="submit" class="btn btn-primary btn-round" name="formdepo" style="margin-top:22px;margin-bottom:0px;">Depo Limitini Kaydet</button>
                                                    </form>
                                                    <?php
													error_reporting(E_ALL ^ E_NOTICE);  
													$depolimitiguncelle=$_POST['depolimitipost'];
													if(isset($_POST['formdepo'])){
														if($depolimitiguncelle != $depolimit[0]){
														mysqli_query($conn,"UPDATE ayarlar SET depo_limiti='$depolimitiguncelle'") or die(mysqli_error());
														echo "<script>
									swal({
  									title: 'Depo Limiti Değiştirildi',
  									text: \"Yeni Depo Limiti:$depolimitiguncelle\",
  									icon: \"success\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";
													}
														else{
															echo "<script>
									swal({
  									title: 'Depo Limiti Değiştirilemedi',
  									text: \"Hiçbir Değişiklik Yapmadınız!\",
  									icon: \"error\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";
														}
													}
													?>
                                                </div>
                                                
                                </div>
                            </div>
                        </div>
                </div>
                   <div class="col-md-4 yetkiselayar">
                            <div class="card card-profile">
                                <div class="content">
                                    <h4 class="card-title">Eleman Kayıt Kodu Oluştur</h4>
                                    <p class="category col-md-12">Yeni Kullanıcılar Sadece Sizin Onların Kullanması İçin Kayıt Edeceğiniz Kayıt Kodu İle Sisteme Kayıt Olabilirler.(6 KARAKTER)</p>
                                    <div class="col-md-12">
                                               <?php
												$elemankayitkodu=mysqli_fetch_array(mysqli_query($conn,"select eleman_kayit_kodu from ayarlar"));
												?>
                                                <div class="form-group label-floating" style="margin-top:-4px;">
                                                    <form action="urunislemleri.php" method="post">
                                   <input type="text" pattern=".{6,6}" class="form-control" id="cmd2" name="elemanpost" placeholder="<?php echo $elemankayitkodu[0] ?>" style="font-size:18px;text-align:center;" maxlength="6" onkeyup="this.value = this.value.turkishToUpper();" required>
                                   <button type="submit" class="btn btn-primary btn-round" name="formkayitkodu" style="margin-top:22px;margin-bottom:0px;">Kodu Kaydet</button>
                                                    </form>
                                                    <?php
													error_reporting(E_ALL ^ E_NOTICE);  
													$elemankayit=strtoupper($_POST['elemanpost']);
													if(isset($_POST['formkayitkodu'])){
														if($elemankayit != $elemankayitkodu[0]){
														mysqli_query($conn,"UPDATE ayarlar SET eleman_kayit_kodu='$elemankayit'") or die(mysqli_error());
							 echo "<script>
									swal({
  									title: 'Eleman Kayıt Kodu Oluşturuldu',
  									text: \"Kayıt Kodu:$elemankayit\",
  									icon: \"success\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";
													}
														else{
															 echo "<script>
									swal({
  									title: 'Eleman Kayıt Kodu Oluşturulamadı',
  									text: \"Hiçbir Değişiklik Yapmadınız!\",
  									icon: \"error\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";
														}
													}
													?>
                                                </div>
                                                
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-md-4 yetkiselayar">
                            <div class="card card-profile">
                                <div class="content">
                                    <h4 class="card-title">Yönetici Kayıt Kodu Oluştur</h4>
                                    <div class="col-md-12">
                                               <?php
												$yoneticikayitkodu=mysqli_fetch_array(mysqli_query($conn,"select yonetici_kayit_kodu from ayarlar"));
												?>
                                                <div class="form-group label-floating" style="margin-top:-4px;">
                                                    <form action="urunislemleri.php" method="post">
                                   <input type="text" pattern=".{6,6}" class="form-control" name="yoneticipost" placeholder="<?php echo $yoneticikayitkodu[0] ?>" style="font-size:18px;text-align:center;" id="cmd3" maxlength="6" onkeyup="this.value = this.value.turkishToUpper();" required>
                                   <button type="submit" class="btn btn-primary btn-round" name="formkayityoneticikodu" style="margin-top:22px;margin-bottom:0px;">Kodu Kaydet</button>
                                                    </form>
                                                    <?php
													error_reporting(E_ALL ^ E_NOTICE);  
													$yoneticikayit=strtoupper($_POST['yoneticipost']);
													if(isset($_POST['formkayityoneticikodu'])){
														if($yoneticikayit != $yoneticikayitkodu[0]){
														mysqli_query($conn,"UPDATE ayarlar SET yonetici_kayit_kodu='$yoneticikayit'") or die(mysqli_error());
							  echo "<script>
									swal({
  									title: 'Yönetici Kayıt Kodu Oluşturuldu',
  									text: \"Kayıt Kodu:$yoneticikayit\",
  									icon: \"success\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";
													}
														else{
															echo "<script>
									swal({
  									title: 'Yönetici Kayıt Kodu Oluşturulamadı',
  									text: \"Hiçbir Değişiklik Yapmadınız!\",
  									icon: \"error\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";
														}
													}
													?>
                                                </div>
                                               <style>
												   @media screen and (max-width:767px){
													   #cmd1{width:100%;}
													   #cmd{width:100%;}
													   #cmd2{width:100%;}
													   #cmd3{width:100%;}
												   }
											   </style>      
                                </div>
                            </div>
                        </div>
                </div>
            </div>
<?php include("footer.php")?>