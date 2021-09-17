<?php

/**
 * Template Name: Featured Bottles
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Women_Owned_Wineries_Sonoma
 */

get_header();

$feat_bottles_page = get_page_by_path('featured bottles');

$content = $feat_bottles_page->post_content;
$content_length = strlen($content);

// echo '<pre class="white text">';var_dump( $feat_bottles_page );echo '</pre>';

$args = array(
    'post_type' => 'featured-bottles',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'ASC',
	'meta_key'		=> 'blog',
	'meta_value'	=> true
);

$featured_bottles = new WP_Query($args); ?>


<section class="section posts">
    <div class="container">

        <div class="columns is-multiline">

            <?php if ($featured_bottles->have_posts()) : while ($featured_bottles->have_posts()) : $featured_bottles->the_post();
                $count++;
                    $title = get_the_title();
                    $content = get_the_excerpt();
                    $vintage = get_field('vintage');
                    $vineyard = get_field('vineyard');
                    $url = get_the_permalink();
                    $date = get_the_date();
                    $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); 
                    $featured_bottles_page = get_page_by_path('featured-bottles');
                    $featured_bottles_title = get_the_title($featured_bottles_page->ID);
                    $featured_bottles_content = $featured_bottles_page->post_content;
                    
                    if ($count == 1) : ?>

                    <div class="column is-half">
                        <h1 class="title"><?php echo $featured_bottles_title; ?></h1>
                        <div class="solo-flourish-divider">
                            <?php echo file_get_contents(get_stylesheet_directory() . '/img/solo-flourish.svg'); ?>
                        </div>
                        <p class="content"><?php echo $featured_bottles_content; ?></p>
                    </div>

                    <a href="<?php echo $url; ?>" class="column is-half">

                        <div class="image-tile featured-bottle">
                            <div class="card-bg" style="background-image: url(<?php echo $image; ?>);"></div>
                            <div class="content has-text-white">
                                <span><?php echo $vintage; ?></span>
                                <h1 class="title"><?php echo $title; ?></h1>
                                <h1 class="vineyard"><?php echo $vineyard; ?></h1>
                                <p><?php echo $content; ?></p>
                            </div>
                        </div>

                    </a>

                    <?php endif;
                        if ($count > 1) : ?>

                        <a href="<?php echo $url; ?>" class="column is-one-third">

                        <div class="image-tile featured-bottle">
                            <div class="card-bg" style="background-image: url(<?php echo $image; ?>);"></div>
                            <div class="content has-text-white">
                                <span><?php echo $vintage; ?></span>
                                <h1 class="title"><?php echo $title; ?></h1>
                                <h1 class="vineyard"><?php echo $vineyard; ?></h1>
                            </div>
                        </div>

                        </a>

                        <?php endif; endwhile; else: ?>
                            <h1 class="title has-text-centered no-posts">No bottles yet.</h1>
                        <?php endif; wp_reset_postdata(); ?>

        </div>
    </div>
</section>


<?php get_footer(); ?>