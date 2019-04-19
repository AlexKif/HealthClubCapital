<div class="sub-post">
    <?php
    // задаем нужные нам критерии выборки данных из БД

    $args = array(
        'posts_per_page' => 4,
        'post__not_in' => array($post->ID),
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => array('post'),
        'post_status' => array('publish'),
    );

    $query = new WP_Query($args);

    // Цикл
    while ($query->have_posts()) {
        $query->the_post();
//            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
        ?>

        <a href="<?php the_permalink() ?>" class="sub-post__box">
            <?php $attr = array(
                'class' => "sub-post__box-photo",
            );
            the_post_thumbnail(array(93, 68), $attr);
            ?>
            <span class="sub-post__box-headline"><?php the_title(); ?></span>
            <span class="sub-post__box-date"><?php echo get_the_date('d/m/y');?></span>
            <div class="clear"></div>
        </a>
        <?php
    }

    // Возвращаем оригинальные данные поста. Сбрасываем $post.

    wp_reset_postdata();
    ?>
</div>



