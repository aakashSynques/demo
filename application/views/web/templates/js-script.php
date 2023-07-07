<script src="<?php echo base_url(); ?>includes/dist/web/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url(); ?>includes/dist/web/js/bootstrap.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>includes/dist/web/js/bootstrap.bundle.min.js"></script> -->
<script src="<?php echo base_url(); ?>includes/dist/web/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>includes/dist/web/js/waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>includes/dist/web/js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url(); ?>includes/dist/web/js/jquery.menu-aim.js"></script>
<script src="<?php echo base_url(); ?>includes/dist/web/js/header_controller.js"></script>
<script src="<?php echo base_url(); ?>includes/dist/web/js/main.js"></script>
<script src="<?php echo base_url(); ?>includes/dist/web/js/mobile-main.js"></script>
<!-- <script src="<?php echo base_url(); ?>includes/dist/web/js/slinky.menu.js"></script> -->
<script>
	$(".counter .feature-text span").counterUp({
		delay: 50,
		time: 5000
	});


	$("#testimonial").owlCarousel({
    items: 1,margin:15,center: true,
    loop: true,dots:true,
    autoplay: true, nav: false,smartSpeed:1000,
    autoplayTimeout: 7000, autoplayHoverPause: true, 
    responsiveClass:true,
    navText: [ '<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>' ]
        });

// client logo owlCarousel	        
$("#logos").owlCarousel({
                    items: 3, margin:0,
                    loop: true, dots:true,
                    autoplay: true, nav: false,smartSpeed:500,
                    autoplayTimeout: 6000, autoplayHoverPause: true, 
                    responsiveClass:true, animateOut: 'animate__zoomOut',
    animateIn: 'animate__zoomIn',
                    navText: [ '<span class="la la-arrow-left"></span>', '<span class="la la-arrow-right"></span>' ],
                    responsive:{
        0:{
            items:2,
        },
        768:{
            items:2,
        },
        1000:{
            items:3,
        },
        1200:{
            items:3,
        }
    }	
        });
        

// services owl owlCarousel		
        $("#services").owlCarousel({
                    items: 3, margin:20,
                    loop: true, dots:true,
                    autoplay: true, nav: false,smartSpeed:500,
                    autoplayTimeout: 6000, autoplayHoverPause: true, 
                    responsiveClass:true, animateOut: 'animate__zoomOut',
    animateIn: 'animate__zoomIn',
                    navText: [ '<span class="fa fa-arrow-left"></span>', '<span class="fa fa-arrow-right"></span>' ],
                    responsive:{
        0:{
            items:1,
        },
        768:{
            items:1,
        },
        1000:{
            items:3,
        },
        1200:{
            items:3,
        }
    }	
        });	
        

// product owlCarousel		
        $("#products").owlCarousel({
                    items: 3, margin:20,
                    loop: true, dots:true,
                    autoplay: true, nav: false,smartSpeed:500,
                    autoplayTimeout: 6000, autoplayHoverPause: true, 
                    responsiveClass:true, animateOut: 'animate__zoomOut',
    animateIn: 'animate__zoomIn',
                    navText: [ '<span class="fa fa-arrow-left"></span>', '<span class="fa fa-arrow-right"></span>' ],
                    responsive:{
        0:{
            items:1,
        },
        768:{
            items:1,
        },
        1000:{
            items:3,
        },
        1200:{
            items:3,
        }
    }	
        });

</script>

