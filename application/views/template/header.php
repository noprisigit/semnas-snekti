<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<title>SNEKTI - INSTITUT TEKNOLOGI PLN | <?= $title; ?></title>
	<!--Favicon-->
	<link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>assets/images/faviconS.png" />
	<!--Bootstrap Stylesheet-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.css">
	<!--Owl Carousel Stylesheet-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/owl.carousel.min.css">
	<!--Font Awesome Stylesheet-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/font-awesome.min.css">
	<!-- flat icon  -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/fonts/flaticon.css">
	<!--Animate Stylesheet-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/animate.css">
	<!--Venobox Stylesheet-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/venobox.css">
	<!--Main Stylesheet-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/style.css">
	<!--Responsive Stylesheet-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/responsive.css">

	<!--jQuery JS-->
	<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
	<!--Modanizr JS-->
	<script src="<?= base_url(); ?>assets/js/modernizr.custom.js"></script>
	<script src="<?= base_url(); ?>assets2/plugins/sweetalert2/sweetalert2.all.min.js"></script>

</head>

<body class="body-class index_2 home2">
	<!--Start Preloader-->
	<div class="site-preloader">
		<div class="spinner">
			<div class="double-bounce1"></div>
			<div class="double-bounce2"></div>
		</div>
	</div>
	<!--End Preloader-->

	<!--Start Body Wrap-->
	<div id="body-wrap">
		<!--Start Header-->
		<header id="mainHeader" class="header">
			<!-- Start Navigation -->
			<nav class="navbar navbar-expand-lg navbar-light bg-light p-0">
				<div class="container">
					<a class="navbar-brand" href="<?= base_url(); ?>">
						<img src="<?= base_url(); ?>assets/images/brand/logo.png" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto" id="navbarMenu">
							<li class="nav-item <?= ($title == 'Beranda') ? 'active' : ''; ?>" id="home">
								<a class="nav-link" href="<?= base_url(); ?>">Home</a>
							</li>
							<li class="nav-item <?= ($title== 'date' or $title == 'Jadwal' or $title == 'Topik' or $title == 'Biaya' or $title == 'Lokasi' or $title == 'Materi') ? 'active' : ''; ?> dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
								 aria-haspopup="true" aria-expanded="false">
									Call for Paper
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="<?= base_url('page/date'); ?>">Important Date</a>
									<a class="dropdown-item" href="<?= base_url('page/topik'); ?>">Conference Scope</a>
									<a class="dropdown-item" href="<?= base_url('page/biaya'); ?>">Conference Fee</a>
									<a class="dropdown-item" href="<?= base_url('page/location'); ?>">Venue</a>
									<a class="dropdown-item" href="<?= base_url('page/materi'); ?>">Download Material Pembicara</a>
								</div>
							</li>
							<li class="nav-item <?= ($title == 'Publikasi') ? 'active' : ''; ?>">
								<a class="nav-link" href="<?= base_url('page/publikasi'); ?>">Publication</a>
							</li>
							<li class="nav-item <?= ($title == 'ibea2020') ? 'active' : ''; ?>">
								<a class="nav-link" href="<?= base_url('page/ibea2020'); ?>">Seminar IBEA 2020</a>
							</li>
							<li class="nav-item dropdown <?= ($title == 'Registrasi Pemakalah' or $title == 'Registrasi Semnas' or $title == 'Upload Bukti Bayar') ? 'active' : '';	 ?>">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
								 aria-haspopup="true" aria-expanded="false">
									Submission
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="https://drive.google.com/file/d/1h6E8t2R4_euo_XWkX3x39BX2W9Q4qGvM/view" target="_blank">Conference Tracks</a>
									<a class="dropdown-item" href="https://drive.google.com/file/d/1h6E8t2R4_euo_XWkX3x39BX2W9Q4qGvM/view" target="_blank">Template Artikel</a>
									<a class="dropdown-item" href="<?= base_url('registration'); ?>">Non Pemakalah</a>
									<a class="dropdown-item" href="<?= base_url('registration/pemakalah') ?>">Pemakalah</a>
									<a class="dropdown-item" href="<?= base_url('registration/upload-bukti-bayar') ?>">Upload Bukti Bayar</a>
								</div>
							<li class="nav-item <?= ($title == 'komite') ? 'active' : ''; ?>">
								<a class="nav-link" href="<?= base_url('page/komite'); ?>">Organizing Commitee</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<!-- End Navigation -->
			<div class="clearfix"></div>
		</header>
		<!--End Header-->