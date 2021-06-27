<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
<title>Stocky-Giriş Paneli</title>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<link href="assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
   <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
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
	#reglink:hover{color:#E009FF;}
</style>
<?php include("baglan.php");?>
</head>

<body>
	<div class="row bg">
                        <div class="col-sm-6 col-sm-offset-3 form-box" style="margin-top:10em;">
                        	<div class="form-top">
                        		<div class="form-top-left col-md-6">
									<h3>Stocky Giriş Paneli</h3>
                        		</div>
                           <div style="float:right;margin-top:1.6em;color:#434343;text-decoration:underline;"><a href="kayit.php" id="reglink">Kayıt Ol</a></div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="login.php" method="post" class="login-form">
			                    	<div class="form-group">
			                        	<input type="text" name="kadi" placeholder="Kullanıcı Adı:" class="form-username form-control" id="form-username" maxlength="22" required>
			                        </div>
			                        <div class="form-group">
			                        	<input type="password" name="sifre" placeholder="Şifre:" class="form-password form-control" id="form-password" maxlength="22" required>
			                        </div>
			                        <button type="submit" class="btn" style="background-color:purple !important;" name="Giris">Giriş Yap</button>
			                    </form>
			                    <span style="float:left;width:100%;text-align:center;">Kullanıcı Adı:<b>stokyadmin / stokyeleman</b> Şifre:<b>123</b></span>
		                    </div>
                        </div>
                    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>
</html>