<?php
get_header();
?>
<div class="container">
    <div class="wrap post-wrap">
        <div class="left-block-content">
            <?php get_template_part( 'template-parts/article' ); ?>
        </div>
        <?php get_template_part( 'template-parts/aside' ); ?>
    </div>
</div>

<?php
get_footer();
