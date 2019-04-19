<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('description') ?></title>
	<?php wp_head(); ?>
</head>
<body>
<div class="page">
    <header class="header">
        <div class="wrap header-wrap">
            <nav class="navbar navbar-expand-lg navbar-light">
                <?php the_custom_logo(); ?>
                <button class="navbar-toggler toggle-btn" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php
                wp_nav_menu( array(
                    'theme_location'   => 'main menu',
                    'depth'            => 2,
                    'container'        => 'div',
                    'container_class'  => 'collapse navbar-collapse',
                    'container_id'     => 'navbarNavAltMarkup',
                    'menu_class'       => 'navbar-nav',
                    'fallback_cb'      => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'           => new WP_Bootstrap_Navwalker()
                ) );
                ?>
                <div class="social">
                    <a href="#" class="social__link"><i class="fab fa-facebook-f social__link-icon"></i></a>
                    <a href="#" class="social__link"><i class="fab fa-twitter social__link-icon"></i></a>
                </div>
            </nav>
        </div>
    </header>
