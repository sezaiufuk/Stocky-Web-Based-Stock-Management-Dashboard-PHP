<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<title>Stoky-Giriş Paneli</title>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<link href="assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
   <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
<?php include("baglan.php");?>
<style>
	body, html {
    height: 100%;
    margin: 0;
		overflow: hidden;
		
}
	

.bg {
    /* The image used */
    background-image: url("assets/img/giris.png");

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
</style>
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
</head>

<body>
	<div class="row bg">
                        <div class="col-sm-6 col-sm-offset-3 form-box" style="margin-top:5em;">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Stoky Kayıt Paneli</h3>
                        			
                        		</div>
								<span><a href="giris.php" style="color:purple;margin-top:1.6em;float:right;font-size:16px;text-decoration:underline">Giriş Sayfası</a></span>
                            </div>
                            
                            <div class="form-bottom">
			                    <div class="card-content">
                                    <form method="POST" action="kayitislem.php">
                                        <div class="row" style="color:#7B7B7B;">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Kayıt Kodunuz:</label>
                                                    <input type="text" class="form-control" name="kayitkod" pattern=".{6,6}" maxlength="6" oninvalid="this.setCustomValidity('Kod 6 Karakter Uzunluğunda Olmalıdır.')" oninput="setCustomValidity('')" onkeyup="this.value = this.value.turkishToUpper();" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Kullanıcı Adınız:</label>
                                                    <input type="text" class="form-control" name="kayitkuladi" oninvalid="this.setCustomValidity('Giriş Yaparken Kullanacağınız Kullanıcı Adını Giriniz')" oninput="setCustomValidity('')" maxlength="12" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Şifreniz:</label>
                                                    <input type="password" class="form-control" name="kayitsifre" oninvalid="this.setCustomValidity('Şifrenizi Giriniz')" oninput="setCustomValidity('')" maxlength="32"  required>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row" style="color:#7B7B7B;">
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Adınız:</label>
                                                    <input type="text" class="form-control" name="kayitkulisimi" oninvalid="this.setCustomValidity('Adınızı Giriniz')" oninput="setCustomValidity('')" onkeyup="this.value = this.value.turkishToUpper();" maxlength="32"  required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Soyadınız:</label>
                                                    <input type="text" class="form-control" name="kayitsoyadi" oninvalid="this.setCustomValidity('Soyadınızı Giriniz')" oninput="setCustomValidity('')" onkeyup="this.value = this.value.turkishToUpper();" maxlength="32" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Adresiniz:</label>
                                                    <input type="text" class="form-control" name="kayitadres" oninvalid="this.setCustomValidity('Adresinizi Giriniz')" oninput="setCustomValidity('')" onkeyup="this.value = this.value.turkishToUpper();" maxlength="122"  required>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn" style="background-color:purple !important;" name="kayitBtn">Kayıt Ol</button>
                                        <div class="clearfix"></div>
                                    </form>
                                    <span style="float:left;width:100%;text-align:center;">Eleman Kodu:<b>EL1234</b> / Yönetici Kodu:<b>YN1234</b></span>
                                </div>
		                    </div>
                        </div>
                    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>