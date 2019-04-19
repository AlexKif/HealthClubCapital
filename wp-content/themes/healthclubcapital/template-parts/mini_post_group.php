<?php
global $post_not_in;
$post_not_in    =! empty( $post_not_in ) ? $post_not_in : array();
?>
<section class="mini-post-group">
    <div class="wrap mini-post-group-wrap">
        <?php

        // задаем нужные нам критерии выборки данных из БД
        $args = array(
            'posts_per_page'   => 3,
            'category__not_in' => 1,
            'orderby' => 'date',
            'order'            => 'ASC',
            'post__not_in'     => $post_not_in,
            'post_type'        => array( 'post' ),
            'post_status'      => array( 'publish' ),
        );

        $query = new WP_Query( $args );

        // Цикл
        if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
        $query->the_post();
        ?>
        <?php $post_not_in[] = $post->ID; ?>
            <a href="<?php the_permalink() ?>" class="aside-mini-post mini-post-group-box">
                <div class="mini-post-group-box__photo">
                    <?php  $attr = array(
                        'class' => "adaptive-photo",
                        'alt'   => "photo-1"
                    );?>
                    <?php the_post_thumbnail(array(380, 280), $attr); ?>
                </div>
                <div class="mini-post-group-box-cont">
                    <span class="aside-mini-post__sub-headline"><?php echo get_the_category()[0]->cat_name; ?></span>
                    <h3 class="aside-mini-post__headline aside-mini-post__headline-md"><?php the_title(); ?></h3>
                    <p class="aside-mini-post__text"><?php echo  get_the_excerpt(); ?></p>
                </div>
            <?php
            }
            } else {
                echo "Записей нету";
            }
            // Возвращаем оригинальные данные поста. Сбрасываем $post.
            wp_reset_postdata();

            ?>
        </a>
    </div>
</section>



