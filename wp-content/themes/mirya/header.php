<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	    <meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
        <link rel="stylesheet" href="https://rawcdn.githack.com/jerfeson/floating-whatsapp/0310b4cd88e9e55dc637d1466670da26b645ae49/floating-wpp.min.css">
        <script type="text/javascript" src="https://rawcdn.githack.com/jerfeson/floating-whatsapp/0310b4cd88e9e55dc637d1466670da26b645ae49/floating-wpp.min.js"></script>
        <div id="WABoton"></div>
		<?php wp_head(); ?>
	</head>
    <body <?php body_class(); ?>>
        
        <?php wp_body_open(); ?>

        <!-- ========== Start Loading ========== -->
        
        <div class="preloader">
            <div class="loading-overlay">
                <div class="loading-inner">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>

        <!-- ========== End Loading ========== -->

        <!-- ========== Start Navbar ========== -->

        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button class="menu-toggle">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </button>
                    <!-- logo -->
                    <a class="navbar-brand" href="<?php  echo esc_url( home_url( '/' ) ); ?>">
                        <?php
                        if (has_custom_logo()) {
                            echo '<img src="' . wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0] . '" alt="' .  get_bloginfo('name') . '">';
                        } else {
                            echo get_bloginfo('name');
                        }
                        ?>
                    </a>
                </div>
                <!-- Collect the nav links, and other content for toggling -->
                <div class="navbar-links" id="ournavbar">
                    <!-- links -->
                    <?php mirya_menu(); ?>
                </div>
            </div>
        </nav>

        <!-- ========== End Navbar ========== -->
        
        <!-- ========== Start Site Content ========== -->
            
        <section class="site-content">