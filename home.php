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

$args = array(  
    'post_type' => array('interviews', 'featured-bottles'),
    'post_status' => 'publish',
    'posts_per_page' => -1, 
    'orderby' => 'title', 
    'order' => 'ASC', 
);

// echo '<pre class="white text">';var_dump(  );echo '</pre>';

$loop = new WP_Query( $args ); ?>

<section class="section regions">
    <div class="container">
        <h1 class="title">
            <?php single_post_title(); ?>
        </h1>

        <?php 
            if ( $page_id = get_option( 'page_for_posts' ) ) {
                // the_content() doesn't accept a post ID parameter
                if ( $post = get_post( $page_id ) ) {
                    setup_postdata( $post ); //  "posts" page is now current post for most template tags        
                    the_content();
                    wp_reset_postdata(); // So everything below functions as normal
                }
            }
        ?>

        <div class="columns is-multiline">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); 
            // echo '<pre class="white text">';var_dump( $post );echo '</pre>';
            if ($post->post_type == 'interviews') : 
                $title = get_the_title();
                $url = get_the_permalink();
                $date = get_the_date();
                $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>

            <a href="<?php echo $url; ?>" class="column is-one-third">
                <div class="card interview">
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
            <?php endwhile; wp_reset_postdata(); ?>
        </div>

    </div>	
</section>

<?php get_footer(); ?>