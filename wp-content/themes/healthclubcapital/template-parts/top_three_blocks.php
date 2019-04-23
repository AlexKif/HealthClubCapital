<section class="top-three-blocks">
    <div class="wrap top-three-blocks-wrap">
        <?php

        // задаем нужные нам критерии выборки данных из БД
        $args = array(
            'posts_per_page' => 3,
            'category__not_in' => 1,
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
            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
            ?>
            <a href="<?php the_permalink() ?>" class="top-box">
                <div class="top-box-hov">
                    <div class="top-box-text">
                        <p class="top-box__title"><?php echo get_the_category()[0]->cat_name; ?></p>
                        <h3 class="top-box__headline"><?php the_title(); ?></h3>
                        <div class="aside-small-post__author top-box__author">
                            <span class="aside-small-post__author-name top-box__author-name"><?php the_author(); ?></span>
                            <span class="aside-small-post__author-date top-box__author-date"><?php echo get_the_date('d/m/y'); ?></span>
                        </div>
                    </div>
                    <div class="top-box-wrap">
                        <?php $attr = array(
                            'class' => "top-box__photo",
                        );
                        the_post_thumbnail(array(380, 280), $attr);
                        ?>
                    </div>
                </div>
            </a>
            <?php
        }

        // Возвращаем оригинальные данные поста. Сбрасываем $post.
        wp_reset_postdata();

        ?>
    </div>
</section>
