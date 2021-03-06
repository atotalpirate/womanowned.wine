<?php

/**
 * Template Name: Press
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Women_Owned_Wineries_Sonoma
 */

get_header(); 

$press_page = get_page_by_path('press');

$content = $press_page->post_content;
$content_length = strlen($content);

    $args = array(  
        'post_type' => 'press',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'DESC'
    );

    $press = new WP_Query( $args ); 

    if ($press->have_posts()) : ?>


<section class="press section">
    <div class="container">
        <h2 class="title has-text-centered">Press</h2>
        
        <div class="content <?php ($content_length > 500) ? 'has-two-columns' : '' ; ?>"> 
            <?php echo $content; ?>
        </div>
        <div class="flourish-divider">
            <?php echo file_get_contents(get_stylesheet_directory() . '/img/flourish.svg'); ?>
        </div>
    <div class="columns is-multiline">
    <?php while ($press->have_posts()) : $press->the_post();
                    $title = get_the_title();
                    $url = get_field('url');
                    $logo = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
            <div class="column is-one-third">
                <div class="box">
                    <a href="<?php echo $url; ?>" target="_blank" >
                        <img src="<?php echo $logo; ?>"alt="">
                    </a>
                    <a href="<?php echo $url; ?>" target="_blank" >
                    <?php echo $title; ?>
                    </a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    </div>
</section>

<?php endif; ?>

<?php get_footer(); ?>