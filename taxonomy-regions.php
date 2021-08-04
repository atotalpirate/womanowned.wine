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

$content = term_description();
$content_length = strlen($content); ?>

<section class="section regions">
    <div class="container">
        <h1 class="title">
            <?php echo $term; ?>
        </h1>

        <div class="columns is-multiline">
            <div class="column is-full has-text-centered">
                <h4 class="is-sans">Featured Bottles</h4>
            </div>
            <?php foreach ($posts as $key => $post) :
                if ($post->post_type == 'interviews') :
                    $title = get_the_title();
                    $url = get_the_permalink();
                    $date = get_the_date();
                    $winery = get_field('winery');
                    $winery_id = $winery->ID;
                    $vintner = get_field('proprietor', $winery_id);
                    $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>


                    <a href="<?php echo $url; ?>" class="column is-one-third">
                        <div class="card-2">
                            <div class="image-tile interview">
                                <div class="card-bg" style="background-image: url(<?php echo $image; ?>);"></div>
                                <div class="content has-text-white">
                                    <span><?php echo $date; ?></span>
                                    <h1 class="title "><?php echo $title; ?></h1>
                                    <h1 class="vintner"><?php echo $vintner; ?></h1>
                                </div>
                            </div>
                            <div class="footer">
                                <?php echo $content; ?>
                            </div>
                        </div>
                    </a>

            <?php endif;
            endforeach; ?>

        </div>

        <div class="columns is-multiline">
            <div class="column is-full has-text-centered">
                <h4>Featured Bottles</h4>
            </div>
            <?php foreach ($posts as $key => $post) :
                if ($post->post_type == 'featured-bottles') :
                    
                    $title = get_the_title();
                    $content = get_the_excerpt();
                    $vintage = get_field('vintage');
                    $vineyard = get_field('vineyard');
                    $url = get_the_permalink();
                    $region = get_the_terms($post->ID, 'regions');
                    $date = get_the_date();
                    $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); 
                    $featured_bottles_page = get_page_by_path('featured-bottles');
                    $featured_bottles_title = get_the_title($featured_bottles_page->ID);
                    $featured_bottles_content = $featured_bottles_page->post_content;?>

                    <a href="<?php echo $url; ?>" class="column is-one-third">

                        <div class="image-tile featured-bottle">
                            <?php if ($region[0]->name) : ?>
                                <span class="tag is-link is-medium">
                                    <?php echo $region[0]->name; ?>
                                </span>
                            <?php endif; ?>
                            <div class="card-bg" style="background-image: url(<?php echo $image; ?>);"></div>
                            <div class="content has-text-white">
                                <span><?php echo $vintage; ?></span>
                                <h1 class="title"><?php echo $title; ?></h1>
                                <h1 class="vineyard"><?php echo $vineyard; ?></h1>
                            </div>
                        </div>

                    </a>

            <?php endif;
            endforeach; ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>