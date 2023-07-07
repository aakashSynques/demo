<section id="banner-sec"
	style="background: url(<?= base_url('includes/dist/web/img/bolt-banner.jpg') ?>)no-repeat; background-size: cover; background-position: center; padding-top: 100px;">
	<div class="container">
		<div class="row  text-center">
			<div class="col-lg-12">
				<h1 class="white-text">Career</h1>
				<div class="breadcrumb-area">
					<div class="breadcrumb-inner">
						<a href='<?php echo base_url(); ?>index'>HOME</a>
						<span class="white-text">CAREER</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="pt-5 pb-5 offer-1">
	<div class="container px-container">
		<div class="box-bg-shadow">
			<div class="row">
				<div class="col-md-6 gray-bg-1">
					<h2 class="mrgt-10">Career Form</h2>

					<!-- career  -->
					<?php include "career-form.php"; ?>
				</div>
				<div class="col-md-6 gray-bg-2">
					<img src="<?php echo base_url(); ?>includes/dist/web/img/career-img-01.jpg"
						alt="<?php echo APP_TITLE; ?>" width="100%">
				</div>
			</div>
		</div>
	</div>
</section>
