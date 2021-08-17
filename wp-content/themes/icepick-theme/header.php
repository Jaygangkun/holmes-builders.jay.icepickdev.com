<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<title><?php wp_title(''); ?></title>

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<!-- Mobile Meta -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	  	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- Google Font	     -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">

	    <!-- Font Awesome -->
	    <script src="https://kit.fontawesome.com/0fa7312826.js" crossorigin="anonymous"></script>
		
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link 
			rel="stylesheet"
			as="font"
			crossorigin
			href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap">
		
    
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<!-- Google Analytics-->
		<!-- end analytics -->
		
		<!-- Fallback for AOS in case of disabled JS -->
		<noscript>
	        <style type="text/css">
	            [data-aos] {
	                opacity: 1 !important;
	                transform: translate(0) scale(1) !important;
	            }
	        </style>
	    </noscript>

	</head>

	<body <?php body_class(); ?>>
  	<div class="header">
	  <nav class="navbar navbar-expand-lg navbar-light top-navbar <?= is_front_page() ? 'front':'' ?>">
		<div class="container d-block">
			<div class="row align-items-center">
				<div class="col">
					<a class="navbar-brand px-2" href="<?php echo home_url(); ?>">
						<?php
						$logo = get_field('header_logo', 'option');
						if($logo) {
							?>
							<img class="header-logo__img" src="<?php echo $logo['url']?>" alt="<?php echo $logo['alt']?>">
							<?php
						}
						?>
					</a>
				</div>
				<div class="col-auto">

					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-content" aria-controls="navbar-content" aria-expanded="false" aria-label="<?php esc_html_e( 'Toggle Navigation', 'theme-textdomain' ); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbar-content">

						<?php icepick_main_nav(); ?>

					</div>
				</div>
				<div class="col-auto col-md d-none d-lg-block">
					<div class="header-links">
						<?php
						$link1 = get_field('header_link1', 'option');
						if(isset($link1)) {
							?>
							<a class="header-link" href="<?php echo $link1['url']?>" target="<?php echo $link1['target']?>"><?php echo $link1['title']?></a>
							<?php
						}
						?>

						<?php
						$link2 = get_field('header_link2', 'option');
						if(isset($link1)) {
							?>
							<a class="header-link" href="<?php echo $link2['url']?>" target="<?php echo $link2['target']?>"><?php echo $link2['title']?></a>
							<?php
						}
						?>
					</div>
					
				</div>
			</div>


		</div>
	</nav>
	</div>

    