<!doctype html>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> -->

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>
        <?php
            echo empty( $post->post_parent ) ? 'Friendshop&excl; | '. get_the_title( $post->ID ) : 'Friendshop&excl; | '. get_the_title( $post->post_parent ).' | ' .get_the_title( $post->ID ) ;
        ?>
        </title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<link href='http://fonts.googleapis.com/css?family=VT323' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Press+Start+2P' rel='stylesheet' type='text/css'>
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <?php
            // IF IS PAGE CONTACT, INCLUDE GOOGLE MAPS CODE
            if(is_page(11)) {
                include('php/google-maps.php');
            }
        ?>

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?> style="-webkit-tap-highlight-color: rgba(0,0,0,0);" class="no-hover">

            <div id="container">

			<header class="header" role="banner">
				<div id="inner-header" class="cf">

					<div class="menu-icon">
					  <span></span>
					</div>

					<nav role="navigation">
						<?php 
                            wp_nav_menu(array(
            					'container' => false,                           // remove nav container
            					'container_class' => 'menu cf',                 // class of container (should you choose to use it)
            					'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
            					'menu_class' => 'nav top-nav cf',               // adding custom nav class
            					'theme_location' => 'main-nav',                 // where it's located in the theme
            					'before' => '',                                 // before the menu
                    			'after' => '',                                  // after the menu
                    			'link_before' => '',                            // before each link
                    			'link_after' => '',                             // after each link
                			    'depth' => 0,                                   // limit the depth of the nav
            					'fallback_cb' => ''                             // fallback function (if there is one)
    						)); 
                        ?>
                        <div class="nav-contact">
							<a href="tel:2122317761"><img src="<?php echo bloginfo('url'); ?>/img/icons/tel.png" alt="tel"></a>
							<a href="mailto:mapes@friendshopedit.com"><img src="<?php echo bloginfo('url'); ?>/img/icons/mail.png" alt="email"></a>
							<a href="https://www.google.com/maps/place/36+W+20th+St,+New+York,+NY+10011/@40.740339,-73.993118,17z/data=!3m1!4b1!4m2!3m1!1s0x89c259a3150164d3:0xdf9c1269f018fb"><img src="<?php echo bloginfo('url'); ?>/img/icons/map.png" target="_blank" alt="map"></a>
						</div>
					</nav>

					<!-- ORIGINAL LOGO AS BG IMAGE -->
                    <div class="logo-header"></div>
                    <!-- NEW SVG LOGO -->                   
                    <div class="logo-header-svg">
                    	<a href="<?php bloginfo('url'); ?>">
                        	<?php include('php/logo-svg.php'); ?>
                        </a>
                    </div>
                    

				</div>
			</header>
