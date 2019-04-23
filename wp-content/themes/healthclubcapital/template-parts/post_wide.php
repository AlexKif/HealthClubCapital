<?php
global $post_not_in;
$post_not_in    = ! empty( $post_not_in ) ? $post_not_in : array();
?>

    <?php

    // задаем нужные нам критерии выборки данных из БД
    $args = array(
        'posts_per_page'   => 1,
        'category__not_in' => 1,
        'orderby'          => 'date',
        'order'            => 'ASC',
        'post_type'        => array( 'post' ),
        'post_status'      => array( 'publish' ),
        'post__not_in'     => $post_not_in
    );

    $query = new WP_Query( $args );

    // Цикл
    if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
    $query->the_post();
    ?>
    <?php $post_not_in[] = $post->ID; ?>
        <article class="post-wide">
            <div class="wrap post-wide-wrap">
                <a href="<?php the_permalink() ?>" class="post-wide-box">
                    <div class="post-wide-box__photo">
                        <?php  $attr = array(
                            'class' => "adaptive-photo",
                            'alt'   => "wide-post"
                        );?>
                        <?php the_post_thumbnail(array(740, 396), $attr); ?>
                    </div>
                    <div class="post-wide-box-content">
                        <h3 class="post-wide-box__headline"><?php the_title(); ?></h3>
                        <div class="first-article__author post-wide-box__author">
                            <span class="first-article__author-name post-wide-box__author-name"><?php the_author(); ?></span>
                            <span class="first-article__author-date post-wide-box__author-date"><?php echo get_the_date('d/m/y'); ?></span>
                        </div>
                        <p class="post-wide-box__text"><?php echo  get_the_excerpt(); ?></p>
                    </div>
                </a>
            </div>
        </article>
        <?php
        }
        } else {
            echo "Записей нету";
        }
        // Возвращаем оригинальные данные поста. Сбрасываем $post.
        wp_reset_postdata();

        ?>

