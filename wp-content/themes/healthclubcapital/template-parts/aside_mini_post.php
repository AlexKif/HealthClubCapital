<?php
// задаем нужные нам критерии выборки данных из БД

// узнаем категорию поста
$categories = get_the_category();
$category_id = $categories[0]->cat_ID;

$args = array(
    'posts_per_page' => 1,
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
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
    ?>
    <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/img/banner-6.jpg" alt="banner-6"
                     class="adaptive-photo"/></a>
    <a href="<?php the_permalink() ?>" class="aside-mini-post">
        <?php $attr = array(
            'class' => "adaptive-photo",
        );
        the_post_thumbnail(array(370, 296), $attr);
        ?>
        <span class="aside-mini-post__sub-headline"><?php echo get_the_category()[0]->cat_name; ?></span>
        <h3 class="aside-mini-post__headline"><?php the_title(); ?></h3>
        <p class="aside-mini-post__text"><?php echo get_the_excerpt(); ?></p>
    </a>
    <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/img/banner-7.jpg" alt="banner-7"
                     class="adaptive-photo"/></a>

    <?php
    // Возвщаем оригинальные данные поста. Сбрасываем $post.
    wp_reset_postdata();
}
?>