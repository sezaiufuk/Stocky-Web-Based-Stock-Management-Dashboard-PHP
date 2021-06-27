<?php
include("baglan.php");
ob_start();
session_start();
if(!isset($_SESSION["girisislemi"])){
    header("Location:giris.php");
}
include("header.php");
$gonderenadi=$kullaniciarray[0]." ".$kullaniciarray[1];
$gonderilenkul="SELECT mesaj_kime,mesaj_icerik,zaman FROM kullanici_mesajlari WHERE mesaj_gonderen='$gonderenadi' order by zaman desc";
$gonderilenyon="SELECT mesaj_icerik,zaman FROM yonetici_mesajlari WHERE mesaj_gonderen='$gonderenadi' order by zaman desc";
$gonderilenel="SELECT  mesaj_icerik,zaman FROM eleman_mesajlari WHERE mesaj_gonderen='$gonderenadi' order by zaman desc";
	$gonderkulsonuc=mysqli_query($conn,$gonderilenkul);
	echo mysqli_error($conn);
$gondersatir=mysqli_num_rows($gonderkulsonuc);

$gonderyonsonuc=mysqli_query($conn,$gonderilenyon);
$gonderyonsatir=mysqli_num_rows($gonderyonsonuc);

$gonderelsonuc=mysqli_query($conn,$gonderilenel);
$gonderelsatir=mysqli_num_rows($gonderelsonuc);

if($kullaniciarray[2]=="Eleman"){
	header("Location:admin.php");
}
?>
<style>#active5 a{background-color:#9c27b0 !important;color:#FFFFFF !important;}
	#active5 i{color:white !important;}</style>
	
	<a class="navbar-brand" href="#" style="margin-left:1.3em;border-bottom:#CCC solid 1px;color:#363636;"> Gönderilen Bildirimler </a>
             <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Kullanıcılara Gönderilen Bildirimler&nbsp;(<span id="gonnumrows"></span>)</h4>
                                    <p class="category">Buradan Kullanıcılara Gönderdiğiniz Bildirimleri Görebilirsiniz.</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Gönderilen</th>
                                            <th>İçerik</th>
                                            <th>Gönderilen Zaman</th>
                                        </thead>
                                        <tbody id="gontr">
                                             <?php 
											
											while($rowg=mysqli_fetch_assoc($gonderkulsonuc)){
												$zamandegisx=date('d-m-y',strtotime($rowg['zaman']))."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".date('H',strtotime($rowg['zaman'])).".".date('i',strtotime($rowg['zaman']));
											echo"<tr style=\"color:#474747;\" class=\"rowclass\"><td>{$rowg['mesaj_kime']}</td>";	
											echo"<td>{$rowg['mesaj_icerik']}</td>";
											echo"<td>$zamandegisx</td></tr>";
											}
											?>
                                                </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Yöneticilere Gönderilen Bildirimler&nbsp;(<span id="gonnumrowsx"></span>)</h4>
                                    <p class="category">Buradan Yöneticilere Gönderdiğiniz Bildirimleri Görebilirsiniz.</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Gönderilen</th>
                                            <th>İçerik</th>
                                            <th>Gönderilen Zaman</th>
                                        </thead>
                                        <tbody id="gonbr">
                                             <?php 
							
											while($rowk=mysqli_fetch_assoc($gonderyonsonuc)){
												$zamandegisy=date('d-m-y',strtotime($rowk['zaman']))."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".date('H',strtotime($rowk['zaman'])).".".date('i',strtotime($rowk['zaman']));
											echo"<tr style=\"color:#474747;\" class=\"rowclass\"><td>Yöneticiler</td>";	
											echo"<td>{$rowk['mesaj_icerik']}</td>";
											echo"<td>$zamandegisy</td>";
											echo"</tr>";}
											
											?>
                                                </tbody>
                                    </table>
                                </div>
                            </div>
                              <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Elemanlara Gönderilen Bildirimler&nbsp;(<span id="gonnumrowsy"></span>)</h4>
                                    <p class="category">Buradan Elemanlara Gönderdiğiniz Bildirimleri Görebilirsiniz.</p>
                                </div>
                                <div class="card-content table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>Gönderilen</th>
                                            <th>İçerik</th>
                                            <th>Gönderilen Zaman</th>
                                        </thead>
                                        <tbody id="gonzr">
                                             <?php 
									
											while($rowe=mysqli_fetch_assoc($gonderelsonuc)){	
			$zamandegis=date('d-m-y',strtotime($rowe['zaman']))."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".date('H',strtotime($rowe['zaman'])).".".date('i',strtotime($rowe['zaman']));
											echo"<tr style=\"color:#474747;\" class=\"rowclass\"><td>Elemanlar</td>";	
											echo"<td>{$rowe['mesaj_icerik']}</td>";
											echo"<td>$zamandegis</td>";
											echo"</tr>";}
											
											?>
                                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>     
<?php include("footer.php");?>