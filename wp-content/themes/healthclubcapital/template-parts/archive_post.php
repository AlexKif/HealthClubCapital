<?php
// задаем нужные нам критерии выборки данных из БД

// узнаем категорию поста
$categories = get_the_category();
$category_id = $categories[0]->cat_ID;

$args = array(
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
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
    ?>
    <a href="<?php the_permalink() ?>" class="category-box">
        <?php $attr = array(
            'class' => "category-box__photo",
        );
        the_post_thumbnail(array(213, 162), $attr);
        ?>
        <div class="category-box__text">
            <h3 class="category-box__text-headline"><?php the_title(); ?></h3>
            <p class="category-box__text-author"><?php the_author(); ?></p>
            <p class="category-box__text-message"><?php echo get_the_excerpt(); ?></p>
        </div>
    </a>

    <?php
    // Возвщаем оригинальные данные поста. Сбрасываем $post.
    wp_reset_postdata();
}
