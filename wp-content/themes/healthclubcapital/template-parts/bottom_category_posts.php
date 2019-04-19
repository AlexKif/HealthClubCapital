<?php
global $post_not_in;
$post_not_in    =! empty( $post_not_in ) ? $post_not_in : array();
?>

<section class="bottom-category wrap">
    <div class="bottom-category-posts">
        <?php

        // задаем нужные нам критерии выборки данных из БД
        $args = array(
            'posts_per_page'   => 2,
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
        <a href="<?php the_permalink() ?>" class="category-box category-box-bottom">
            <?php  $attr = array(
                'class' => "category-box__photo",
                'alt'   => "category"
            );?>
            <?php the_post_thumbnail(array(380, 280), $attr); ?>
            <div class="category-box__text category-box__bottom">
                <h3 class="category-box__text-headline"><?php the_title(); ?></h3>
                <p class="category-box__text-author"><?php the_author(); ?></p>
                <p class="category-box__text-message"><?php echo  get_the_excerpt(); ?></p>
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