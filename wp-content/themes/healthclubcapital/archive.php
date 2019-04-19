<?php
get_header();
?>
<div class="container container-categories">
    <div class="wrap post-wrap">
        <div class="left-block-content left-block-categories">
            <h2 class="category-headline"><?php single_cat_title(); ?></h2>
            <?php get_template_part( 'template-parts/archive_post' ); ?>
        </div>
        <?php get_template_part( 'template-parts/aside' ); ?>
    </div>
</div>
<?php
//get_sidebar();
get_footer();

/*            <?php
                $categories = get_the_category();
                $category_id = $categories[0]->cat_ID;
            */?><!--
            <h2 class="category-headline"><?php /*get_the_category($category_id); */?></h2>-->
