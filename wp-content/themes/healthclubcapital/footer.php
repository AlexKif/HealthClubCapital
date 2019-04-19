<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HealthClubCapital
 */
?>

</section>
<footer class="footer">
    <div class="wrap footer-wrap">
        <h1 class="footer-logo">
            <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/img/logo-footer.png" alt="Health club capital" class="adaptive-photo"></a>
        </h1>
        <?php dynamic_sidebar('footer-sidebar'); ?>
        <div class="footer-social social">
            <a href="#" class="social__link"><i class="fab fa-facebook-f social__link-icon"></i></a>
            <a href="#" class="social__link"><i class="fab fa-twitter social__link-icon"></i></a>
        </div>
        <?php
        wp_nav_menu( array(
            'theme_location'   => 'foot menu',
            'depth'            => 0,
            'container'        => 'nav',
            'container_class'  => 'footer-navigation',
            'menu_class'       => 'menu-footer',
            'fallback_cb'      => 'WP_Bootstrap_Navwalker::fallback',
            'walker'           => new WP_Bootstrap_Navwalker()
        ) );
        ?>
    </div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>



