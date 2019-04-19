<?php if ( have_posts() ) : get_post();
    while (have_posts()) : the_post(); ?>
        <article class="first-article">
            <h1 class="first-article__headline"><?php the_title(); ?></h1>
            <div class="first-article__author">
                <span class="first-article__author-name"><?php the_author(); ?></span>
                <span class="first-article__author-date"><?php echo get_the_date('d/m/y'); ?></span>
            </div>
            <a href="#" class="d-block"><img src="<?php echo bloginfo('template_url'); ?>/img/banner-1.jpg" alt="banner-1" class="first-article__banner"/></a>
            <?php the_content(); ?>
            <a href="#" class="d-block"><img src="<?php echo bloginfo('template_url'); ?>/img/banner-2.jpg" alt="banner-2" class="first-article__banner"/></a>
        </article>
        <?php get_template_part( 'template-parts/more_article' ); ?>
        <button class="next-page">next page</button>
        <a href="#" class="d-block"><img src="<?php echo bloginfo('template_url'); ?>/img/banner-3.jpg" alt="banner-2" class="first-article__banner"/></a>
    <?php endwhile; ?>
<?php endif; ?>
<?php
?>




