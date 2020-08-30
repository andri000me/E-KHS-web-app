<!DOCTYPE html>
<html lang="en">
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$baseURL='http://localhost/ta/';
?>

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>KHS Elektro</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?=$baseURL?>assets/img/icn.png" type="image/x-icon"/>
	<!-- Add to home screen for Windows-->
	<meta name="msapplication-TileImage" content="./assets/icn.png" />
	<meta name="msapplication-TileColor" content="#1269db" />
	<meta name="theme-color" content="#1269db">
	
	<link rel="manifest" href="<?=$baseURL?>assets/manifest.json" />
	<meta name="description" content="404 | APP KHS ELEKTRO" />
	<link rel="apple-touch-icon" href="<?=$baseURL?>assets/icn.png" />

	<!-- Fonts and icons -->
	<script src="<?=$baseURL?>assets/js/plugin/webfont/webfont.min.js"></script> 
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?=$baseURL?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=$baseURL?>assets/css/atlantis.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="<?=$baseURL?>assets/css/demo.css">
</head>
<body class="page-not-found" style="height: 100%;">
	<div class="wrapper not-found" style="background-color: white; max-width: 100%;">
		<div class="animated bounceIn row justify-content-center " style="width: 100%;" >
			<img src="<?=$baseURL?>assets/img/404.jpg" class="col-12 col-md-5 img-fluid">
		</div>
		<div class="desc animated fadeIn" style="color: gray;" ><span>OOPS!</span><br/>Halaman Tidak Ditemukan ...</div>
		<a href="#" onclick="history.back()" class="btn btn-primary btn-back-home mt-4 animated fadeInUp">
			<span class="btn-label mr-2">
				<i class="flaticon-home"></i>
			</span>
			Kembali Ke Rumah
		</a>
	</div>
	<script src="<?=$baseURL?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?=$baseURL?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?=$baseURL?>assets/js/core/popper.min.js"></script>
	<script src="<?=$baseURL?>assets/js/core/bootstrap.min.js"></script>
</body>

</html>