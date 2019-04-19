<?php
global $post_not_in;
$post_not_in    = ! empty( $post_not_in ) ? $post_not_in : array();
?>

<?php
$args = array(
    'posts_per_page' => 1,
    'category__not_in' => 1,
    'orderby' => 'date',
    'post__not_in'     => $post_not_in,
    'post_type'        => array( 'post' ),
    'post_status'      => array( 'publish' ),
    'order'            => 'DESK'
);

$query = new WP_Query( $args );

// Цикл
if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
        $query->the_post();
        ?>
        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
        ?>
        <?php $post_not_in[] = $post->ID; ?>
        <article id="banner-box" class="banner-box">
        <a href="<?php the_permalink() ?>" class="banner-link" style="background-image: url('<?php echo $thumb['0']; ?>')">
            <div class="wrap banner-wrap">
                <p class="category-headline banner-title"><?php echo get_the_category()[0]->cat_name; ?></p>
                <h2 class="banner-headline"><?php the_title(); ?></h2>
                <div class="first-article__author banner-author">
                    <span class="first-article__author-name"><?php the_author(); ?></span>
                    <span class="first-article__author-date"><?php echo get_the_date('d/m/y');?></span>
                </div>

            </div>
        </a>
        </article>
        <?php
    }
} else {
    echo "Записей нету";
}
// Возвращаем оригинальные данные поста. Сбрасываем $post.
wp_reset_postdata();

?>