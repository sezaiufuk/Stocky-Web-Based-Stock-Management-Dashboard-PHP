<?php include("baglan.php");
ob_start();
session_start();
if(!isset($_SESSION["girisislemi"])){
    header("Location:giris.php");
}
include("header.php");
$urunsiniri=mysqli_fetch_array(mysqli_query($conn,"select depo_limiti from ayarlar"));
$animation1="animated slideInLeft";
if($toplamurun['toplamurun']>=$urunsiniri[0]-10 and $toplamurun['toplamurun']!=0){
	$renklimit="#e23f3f";
}
if($kullaniciarray[2]=="Eleman"){
	echo "<style>.yetkiselayar{display:none;}</style>";
}
?>
<style>#active1 a{background-color:#9c27b0 !important;color:#FFFFFF !important;}
	#active1 i{color:white !important;}</style>
                  <a class="navbar-brand" href="#" style="margin-left:1.3em;border-bottom:#CCC solid 1px;color:#363636;">Ana Panel-Genel İstatistikler </a>
                   <div class="content">
                   
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="fa fa-archive"></i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Depo Limiti</p>
                                    <span style="color:<?php echo $renklimit; ?>"><h3 class="title"><?php echo $toplamurun['toplamurun']?>/<?php echo $urunsiniri[0];?></h3></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="green">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Depo Toplam Fiyatı</p>
                                    <h3 class="title"><?php echo $toplamkazanc['toplam'].$kazancsart?></h3>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="fa fa-cubes"></i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Ürün Çeşit Sayısı</p>
                                    <h3 class="title"><?php echo $numrows?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title" style="margin-top:8px;">Tükenmek Üzere Olan Ürünler&nbsp;(<?php echo $numrowsadet ?>)</h4>
                                    <p class="category">4 Adet ve Altındaki Ürünler.</p>
                                </div>
                                <div class="card-content table-responsive" style="border:0;">
                                   <div class="card-content table-responsive" style="<?php echo $scrollkomutu ?>">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Ürün Kodu</th>
                                            <th>Ürün Ad</th>
                                            <th>Ürün Adet</th>
                                            <th>Ürün Fiyat</th>
                                        </thead>
                                        <tbody style="font-size:16px;">
                                             <?php 
											while($row=mysqli_fetch_assoc($kalanadet)){	
											echo"<tr style=\"color:#474747;\"><td>{$row['urun_kodu']}</td>";	
											echo"<td>{$row['urun_adi']}</td>";
											echo"<td>{$row['urun_adet']}</td>";
											echo"<td>{$row['urun_fiyat']}₺</td></tr>";}
											?>
                                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 yetkiselayar">
                              <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Bildirim Gönder</h4>
                                    <p class="category">Buradan Kullanıcılara Bildirim Gönderebilirsiniz.<br>(Maksimum 72 Karakter)</p>
                                </div>
                                <div class="card-content">
                                           <form method="POST" action="admin.php">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12" style="margin-top:-20px">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Bildirim İçeriği:</label>
                                              <input type="text" class="form-control" name="mesaj_icerik" id="cmx" maxlength="72" required>
                                                </div>
                                            <div id="colmg">
                                            <div class="col-md-6 col-xs-6" style="margin-top:-20px">
                                                <div class="form-group label-floating">
                                                   <select style="padding:8px;margin-left:-15px;width:100%;" name="kimeselect" id="cmx2" onchange="admSelectCheck(this)";>
                                                   	  <option value="Yöneticiler">Yöneticiler</option>
                                                   	  <option value="Elemanlar">Elemanlar</option>
                                                   	  <option value="Herkes">Herkes</option>
                                                   	  <option value="Bir Kullanıcıya" id="bks">Bir Kullanıcıya</option>
                                                   </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xs-6" style="margin-top:-20px;display:none;" id="kmf">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Kullanıcı Adı</label>
                                              <input type="text" class="form-control" name="kimekuladi" id="cmx3" onsubmit="return validateFormData(this)">
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
									<button type="submit" class="btn btn-primary col-md-12 col-xs-12" name="formsend">Değişiklikleri Kaydet</button>
                                        <div class="clearfix"></div>
                                        <?php
									echo "<script>
									function admSelectCheck(nameSelect)
{
    if(nameSelect){
        admOptionValue = document.getElementById(\"bks\").value;
        if(admOptionValue == nameSelect.value){
            document.getElementById(\"kmf\").style.display = \"block\";
			var req=\"required\";
        }
        else{
            document.getElementById(\"kmf\").style.display = \"none\";
        }
    }
    else{
        document.getElementById(\"kmf\").style.display = \"none\";
    }
}

									</script>";
										?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
						if(isset($_POST['formsend'])){
							$select=$_POST['kimeselect'];
							$mesaj_kime=$_POST['kimekuladi'];
							$msgbenmi=mysqli_query($conn,"select mesaj_gonderen from eleman_mesajlari where mesaj_gonderen='{$_SESSION['kuladi']}'");
							$msgbenrows=mysqli_num_rows($msgbenmi);
							$mesaj_icerik=addslashes($_POST['mesaj_icerik']);
							$gonderenadi=$kullaniciarray[0]." ".$kullaniciarray[1];
							$aduyum=mysqli_num_rows(mysqli_query($conn,"SELECT kullanici_adi FROM kullanicilar WHERE kullanici_adi='$mesaj_kime'"));
							if($aduyum){
								if($select=="Bir Kullanıcıya" and $mesaj_kime!=$_SESSION['kuladi']){
							  $birkullaniciya=mysqli_query($conn,"INSERT INTO kullanici_mesajlari (mesaj_gonderen,mesaj_kime,mesaj_icerik)
							  VALUES ('$gonderenadi', '$mesaj_kime','$mesaj_icerik');");
									echo "<script>
									swal({
  									title: 'Mesaj Gönderildi',
  									text: \"Gönderilen Kullanıcı:$mesaj_kime\",
  									icon: \"success\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";
									
								}
								else{
									echo "<script>
									swal({
  									title: 'Mesaj Gönderilemedi',
  									text: \"Kendinize Mesaj Gönderemezsiniz!\",
  									icon: \"error\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";
								}
								
							}
							else if($select=="Herkes"){
							  mysqli_query($conn,"INSERT INTO yonetici_mesajlari (mesaj_gonderen,mesaj_icerik)
							  VALUES ('$gonderenadi','$mesaj_icerik');");
							  mysqli_query($conn,"INSERT INTO eleman_mesajlari (mesaj_gonderen,mesaj_icerik)
							  VALUES ('$gonderenadi','$mesaj_icerik');");
								echo "<script>
									swal({
  									title: 'Mesaj Gönderildi',
  									text: \"Gönderilen:Herkes\",
  									icon: \"success\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";
								}
							else if($select=="Yöneticiler"){
							  mysqli_query($conn,"INSERT INTO yonetici_mesajlari (mesaj_gonderen,mesaj_icerik)
							  VALUES ('$gonderenadi','$mesaj_icerik');");
								echo "<script>
									swal({
  									title: 'Mesaj Gönderildi',
  									text: \"Gönderilen:Yöneticiler\",
  									icon: \"success\",
  									button:false,
									})
									</script>";
							  echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";
								}
							else if($select=="Elemanlar"){
							  mysqli_query($conn,"INSERT INTO eleman_mesajlari (mesaj_gonderen,mesaj_icerik)
							  VALUES ('$gonderenadi','$mesaj_icerik');");
								echo "<script>
									swal({
  									title: 'Mesaj Gönderildi',
  									text: \"Gönderilen:Elemanlar\",
  									icon: \"success\",
  									button:false,
									})
									</script>";
									echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";
								}
								else{echo "<script>
									swal({
  									title: 'Mesaj Gönderilemedi',
  									text: \"Böyle Bir Kullanıcı Bulunamadı\",
  									icon: \"error\",
  									button:false,
									})
									</script>";
									echo "<META HTTP-EQUIV=Refresh CONTENT=\"1.6\">";}
						  
						}
					?>
               <div class="col-lg-6 col-md-6" id="colkul">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                   <?php $kullanicilaricek=mysqli_query($conn,"select kullanici_adi,kullanici_ismi,kullanici_soyadi,kullanici_yetkisi from kullanicilar");
										$numrowskul=mysqli_num_rows($kullanicilaricek);
										if($numrowskul>=3){
										$scrollk="max-height:215px;overflow: auto;";
										}?>
                                    <h4 class="title">Kullanıcılar&nbsp;(<?php echo $numrowskul?>)</h4>
                                                                    <p class="category">Sistem Üzerindeki Kayıtlı Kullanıcılar.</p>
                                </div>
                                <div class="card-content table-responsive" style="border:0;">
                                   <div class="card-content table-responsive" style="<?php echo $scrollk ?>">
                                    <table class="table" style="margin-top:-20px;">
                                        <thead class="text-primary">
                                            <th>Kullanıcı Giriş Adı</th>
                                            <th>Kullanıcı Adı</th>
                                            <th>Kullanıcı Soyadı</th>
                                            <th>Kullanıcı Yetkisi</th>
                                        </thead>
                                        <tbody style="font-size:16px;">
                                             <?php 
											while($row=mysqli_fetch_assoc($kullanicilaricek)){	
											echo"<tr style=\"color:#474747;\"><td>{$row['kullanici_adi']}</td>";	
											echo"<td>{$row['kullanici_ismi']}</td>";
											echo"<td>{$row['kullanici_soyadi']}</td>";
											echo"<td>{$row['kullanici_yetkisi']}</td></tr>";}
											?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
					@media screen and (max-width:767px){
						.yetkiselayar{width:100%;}
						#cmx{width:100%;}
						#cmx2{width:100%;}
						#cmx3{width:100%;}
					}
				</style>       
<?php include("footer.php")?>