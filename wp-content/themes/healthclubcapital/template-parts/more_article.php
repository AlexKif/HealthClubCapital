<div class="more-article">
        <?php
        // задаем нужные нам критерии выборки данных из БД

        // узнаем категорию поста
        $categories = get_the_category();
        $category_id = $categories[0]->cat_ID;

        $args = array(
            'posts_per_page' => 3,
            'post__not_in' => array($post->ID),
            'orderby' => 'date',
            'order' => 'DESC',
            'post_type' => array('post'),
            'post_status' => array('publish'),
            'category__in' => $category_id
        );

        $query = new WP_Query($args);

        // Цикл
        while ($query->have_posts()) {
            $query->the_post();
//            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
            ?>

            <a href="<?php the_permalink() ?>" class="small-article">
                <?php $attr = array(
                    'class' => "small-article__photo",
                );
                the_post_thumbnail(array(240, 198), $attr);
                ?>
                <span class="small-article__headline"><?php the_title(); ?></span>
            </a>
            <?php
        }

        // Возвращаем оригинальные данные поста. Сбрасываем $post.

        wp_reset_postdata();
        ?>
</div>

