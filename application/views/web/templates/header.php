<!doctype html>
<html lang="en">

<head>
	<?php include "css-link.php"; ?>
	<title>
		<?php echo $title . " | " . APP_TITLE; ?>
	</title>
</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 top-header d-none d-md-block">
				<i class="fa fa-phone"></i><a href="tel:07554280210" class="white-text"> +91-755-4280210</a> | <i
					class="fa fa-envelope"></i> <a href="mailto:office@fitwellfasteners.com"
					class="white-text">office@fitwellfasteners.com</a>
			</div>
			<div class="col-md-4 top-header top-header1">
				<ul class="social-link"><i class="fa fa-home"></i><a href='<?php echo base_url(); ?>index'
						class="white-text"> Home</a>
					<li> | </li> Find us on: <li><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<!--offcanvas menu area start-->
	<div class="off_canvars_overlay"></div>
	<div class="offcanvas_menu">
		<div class="container-fluid">
			<div class="row">
				<div class="col-6">
					<div class="logo">
						<a href='<?php echo base_url(); ?>index'>
							<img src="<?php echo base_url(); ?>includes/dist/web/img/fitwell-logo-01.png"
								alt="<?php echo APP_TITLE; ?>" class="img-fluid">
						</a>
					</div>
				</div>
				<div class="col-6">
					<div class="canvas_open">
						<a href="javascript:void(0)"><i class="fa fa-bars"></i></a>
					</div>
					<div class="offcanvas_menu_wrapper">
						<div class="canvas_close">
							<a href="javascript:void(0)"><i class="fa fa-close"></i></a>
						</div>
						<div id="menu" class="text-left ">
							<ul class="offcanvas_main_menu">
								<li><a href='<?php echo base_url(); ?>about'>About Us</a>
								<li>
								<li><a href='<?php echo base_url(); ?>products'>Products</a></li>
								<li><a href='<?php echo base_url(); ?>major-customers'> Major Customers</a></li>
								<li><a href='<?php echo base_url(); ?>infrastructure'>Infrastructure </a></li>
								<li><a href='<?php echo base_url(); ?>quality'>Quality </a></li>
								<li><a href='<?php echo base_url(); ?>career'>Career</a></li>
								<li><a href='<?php echo base_url(); ?>contact'>Contact Us</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--offcanvas menu area end-->

	<div class="main_header">
		<div class="header_middle sticky-header">
			<div class="container-fluid">
				<div class="row ">
					<div class="col-md-3 col-sm-3 col-3">
						<div class="logo">
							<a href='<?php echo base_url(); ?>index'>
								<img src="<?php echo base_url(); ?>includes/dist/web/img/fitwell-logo-01.png"
									alt="<?php echo APP_TITLE; ?>" class="img-fluid">
							</a>
						</div>
					</div>
					<div class="col-lg-9">
						<!--main menu start-->
						<div class="main_menu ml-auto">
							<nav>
								<ul>
									<li><a href='<?php echo base_url(); ?>about'>About Us</a>
									<li>
									<li><a href='<?php echo base_url(); ?>products'>Products</a></li>
									<li><a href='<?php echo base_url(); ?>major-customers'> Major Customers</a></li>
									<li><a href='<?php echo base_url(); ?>infrastructure'>Infrastructure </a></li>
									<li><a href='<?php echo base_url(); ?>quality'>Quality </a></li>
									<li><a href='<?php echo base_url(); ?>career'>Career</a></li>
									<li><a href='<?php echo base_url(); ?>contact'>Contact Us</a></li>
								</ul>
							</nav>
						</div>
						<!--main menu end-->
					</div>
				</div>
			</div>
		</div>
	</div>
