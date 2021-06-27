<!doctype html>
<html lang="tr"><head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Stocky Yönetim Paneli</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="viewport" content="width=device-width" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <link href="assets/css/animate.css" rel="stylesheet" media="all"/>
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel="stylesheet" type="text/css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
	<!---<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
	<!--<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
  	<link href="assets/sweetalert/dist/sweetalert.css" media="all" type="text/css" rel="stylesheet">-->
  	<script src="assets/js/sweetalert.js" type="text/javascript"></script>
    <?php
	$kulbilgicek=mysqli_query($conn,"SELECT kullanici_ismi,kullanici_soyadi,kullanici_yetkisi,kullanici_adresi FROM kullanicilar WHERE kullanici_adi ='{$_SESSION['kuladi']}'");
	$kullaniciarray=mysqli_fetch_array($kulbilgicek);
	?>
    <style>
		body{overflow: hidden;}
		#mesajmenusu li{margin-top:-5px;}
	</style>
	<script type="text/javascript">
window.onload=function() {
   var count=document.getElementById('mesajmenusu').getElementsByTagName('li').length;
	document.getElementById("mesajadeti").innerHTML = count;
	if(count==0){
		document.getElementById("hourprg").innerHTML = "<li style=\"text-align:center !important;margin-top:4px;border-top:1px #CCC solid;\"><i class=\"fa fa-times-circle\"></i>&nbsp;&nbsp;Yeni Bildirim Bulunamadı!</li>";
     }
	else{$("span.notification").css("display", "block");
		document.getElementById("hourprg").innerHTML ="<i class=\"fa fa-info-circle\"></i>&nbsp;&nbsp;Bildirimler 24 Saat İçerisinde Silinecektir."}
	var countgon=document.getElementById('gontr').getElementsByClassName('rowclass').length;
	document.getElementById("gonnumrows").innerHTML = countgon;
	var countgonx=document.getElementById('gonbr').getElementsByClassName('rowclass').length;
	document.getElementById("gonnumrowsx").innerHTML = countgonx;
	var countgony=document.getElementById('gonzr').getElementsByClassName('rowclass').length;
	document.getElementById("gonnumrowsy").innerHTML = countgony;
}
</script>
</head>
<body>
    <div class="wrapper">
       <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-1.jpg">
         <div class="sidebar" data-color="purple">
            <div class="logo">
                <a href="admin.php" class="simple-text" style="padding-bottom:5px;">
                    Stocky
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li id="active1">
                        <a href="admin.php" class="animated">
                            <i class="material-icons">dashboard</i>
                            <p>Ana Panel</p>
                        </a>
                    </li>
                    <li id="active2">
                        <a href="urunislemleri.php">
                            <i class="fa fa-cogs"></i>
                            <p>Ürün İşlemleri & Ayarlar</p>
                        </a>
                    </li>
                    <li id="active3">
                        <a href="urunstok.php">
                            <i class="material-icons">content_paste</i>
                            <p>Ürün Stokları</p>
                        </a>
                    </li>
                    <li id="active5" style="margin-bottom:9px;">
                        <a href="gonderilen.php">
                            <i class="material-icons">message</i>
                            <p>Gönderilen Bildirimler</p>
                        </a>
                    </li>
                    <li style="border-top:1px dashed #cfcfcf;">
                        <a href="cikis.php">
                            <i class="fa fa-sign-out"></i>
                            <p>Çıkış Yap</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
					</div><style>#msglis{display:none}</style>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" onClick="myFunction">
                                    <i class="material-icons">notifications</i>
                                   
                                    <span class="notification" id="mesajadeti" style="display:none;"></span>
                                    <p class="hidden-lg hidden-md">Notifications</p>
                                </a>
                                <ul class="dropdown-menu" id="mesajmenusu" style="width:450px;max-height:420px;overflow-y:scroll;">
                                  <p style="border-bottom:1px solid #D6D6D6;text-align:center;margin-bottom:4px;" id="hourprg"></p>
                                   <?php
					$msgsahibi=$kullaniciarray[0]." ".$kullaniciarray[1];
					$yoneticimesajcek=mysqli_query($conn,"select mesaj_gonderen,mesaj_icerik from yonetici_mesajlari where mesaj_gonderen <> '$msgsahibi' order by zaman desc");
									$elemanmesajcek=mysqli_query($conn,"select mesaj_gonderen,mesaj_icerik from eleman_mesajlari where mesaj_gonderen <> '$msgsahibi' order by zaman desc");
								    $kulmesajcek=mysqli_query($conn,"select mesaj_gonderen,mesaj_icerik from kullanici_mesajlari where (mesaj_kime='{$_SESSION['kuladi']}' AND mesaj_gonderen <> '$msgsahibi') order by zaman desc");
									if($kullaniciarray[2]=="Yönetici"){
										  while($mesaj = mysqli_fetch_assoc($yoneticimesajcek))
										  	{
        									echo "<li style=\"border-bottom:1px solid #D6D6D6;text-align:left;\"><a><b>Gönderen: ".$mesaj['mesaj_gonderen']."</b><br>".$mesaj['mesaj_icerik']."</a>";
    										}
									}
									else if($kullaniciarray[2]=="Eleman"){
										echo "<style>#active5{display:none}#active3{margin-bottom:6px;}#colkul{width:100% !important}</style>";
										while($mesaj = mysqli_fetch_assoc($elemanmesajcek))
										  	{
        									echo "<li style=\"border-bottom:1px solid #D6D6D6;text-align:left;\"><a><b>Gönderen: ".$mesaj['mesaj_gonderen']."</b><br>".$mesaj['mesaj_icerik']."</a>";
    										}
									}
								    if(mysqli_num_rows($kulmesajcek)!=0){
				echo "<p style=\"border-top:1px solid #D6D6D6;border-bottom:1px solid #D6D6D6;text-align:center;padding-top:5px;padding-bottom:5px;margin-bottom:-1px;width:100%;color:#9b2e99;\"><b>Size Özel Mesajlar</b></p>";
										while($mesaj = mysqli_fetch_assoc($kulmesajcek))
										  	{
        									echo "<li style=\"text-align:left;border-bottom:1px solid #D6D6D6;padding:0;margin:0;\"><a><b>Gönderen: ".$mesaj['mesaj_gonderen']."</b><br>".$mesaj['mesaj_icerik']."</a>";
    										}
									}
									?>
                              </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <script>
			String.prototype.turkishToLower = function(){
  var string = this;
  var letters = { "İ": "i", "I": "ı", "Ş": "ş", "Ğ": "ğ", "Ü": "ü", "Ö": "ö", "Ç": "ç" };
  string = string.replace(/(([İIŞĞÜÇÖ]))/g, function(letter){ return letters[letter]; })
  return string.toLowerCase();
}

String.prototype.turkishToUpper = function(){
  var string = this;
  var letters = { "i": "İ", "ş": "Ş", "ğ": "Ğ", "ü": "Ü", "ö": "Ö", "ç": "Ç", "ı": "I" };
  string = string.replace(/(([iışğüçö]))/g, function(letter){ return letters[letter]; })
  return string.toUpperCase();
}</script>       