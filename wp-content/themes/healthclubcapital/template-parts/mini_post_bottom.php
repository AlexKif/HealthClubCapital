<?php
global $post_not_in;
$post_not_in    =! empty( $post_not_in ) ? $post_not_in : array();
?>

<section class="mini-post-bottom wrap">
    <div class="mini-post-bottom-content">
        <?php

        // задаем нужные нам критерии выборки данных из БД
        $args = array(
            'posts_per_page'   => 6,
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
        <a href="<?php the_permalink() ?>" class="sub-post__box sub-post__box-bottom">
            <div class="mini-post-photo-wrap">
                <?php  $attr = array(
                    'class' => "sub-post__box-photo mini-post-photo",
                    'alt'   => "sub-post-1"
                );?>
                <?php the_post_thumbnail(array(215, 154), $attr); ?>
            </div>
            <div class="sub-post__box-text">
                <h3 class="sub-post__box-headline sub-post__box-bottom-headline"><?php the_title(); ?></h3>
                <span class="sub-post__box-date"><?php echo get_the_date('d/m/y');?></span>
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


