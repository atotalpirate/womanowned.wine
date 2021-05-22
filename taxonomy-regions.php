<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$description = get_the_archive_description();

// echo '<pre class="white text">';var_dump( $page );echo '</pre>';
?>

<section class="section regions">
    <div class="container">
        <h1 class="title">
            <?php echo $term; ?>
        </h1>

        <div class="columns">
        <?php foreach ($posts as $key => $post) : 
            if ($post->post_type == 'interviews') : 
                $title = get_the_title();
                $url = get_the_permalink();
                $date = get_the_date();
                $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>

            <a href="<?php echo $url; ?>" class="column is-one-third">
                <div class="card">
                    <span class="tag is-link is-medium">
                        Interview
                    </span>
                    <div class="card-bg" style="background-image: url(<?php echo $image; ?>);"></div>
                    <div class="card-content has-text-white">
                        
                        <h1 class="title is-3"><?php echo $title; ?></h1>
                        <div class="meta">
                            <span>Posted on <?php echo $date; ?></span>
                        </div>
                        <div class="content has-text-white">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </div>
            </a>

            <?php endif; 
            if ($post->post_type == 'featured-bottles') : 
                $title = get_the_title();
                $url = get_the_permalink();
                $date = get_the_date();
                $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>

            <a href="<?php echo $url; ?>" class="column is-one-third">
                <div class="card featured-bottle">
                    <span class="tag is-link is-medium">
                        Featured Bottle
                    </span>
                    <div class="card-bg" style="background-image: url(<?php echo $image; ?>);"></div>
                    <div class="card-content has-text-white">
                        <h1 class="title is-3"><?php echo $title; ?></h1>
                        <div class="meta">
                            <span>Posted on <?php echo $date; ?></span>
                        </div>
                        <div class="content has-text-white">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                </div>
            </a>

            <?php endif; ?>
        <?php endforeach; ?>
        </div>

    </div>	
</section>

<?php get_footer(); ?>