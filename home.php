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
// echo '<pre class="white text">';var_dump( $post );echo '</pre>';

$interview = array(
    'post_type' => 'interviews',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    // 'orderby' => 'title',
    'order' => 'ASC',
);

$interviews = new WP_Query($interview);

$bottle = array(
    'post_type' => 'featured-bottles',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'orderby' => 'title',
    'order' => 'ASC',
);

$featured_bottles = new WP_Query($bottle); ?>

<section class="section posts">
    <div class="container">

        <div class="columns is-multiline">

            <?php while ($interviews->have_posts()) : $interviews->the_post();
                $count++;
                    $title = get_the_title();
                    $content = get_the_excerpt();
                    $winery = get_field('winery');
                    $winery_id = $winery->ID;
                    $vintner = get_field('proprietor', $winery_id);
                    $url = get_the_permalink();
                    $date = get_the_date();
                    $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                    $interviews_page = get_page_by_path('interviews');
                    $interviews_title = get_the_title($interviews_page->ID);
                    $interviews_content = $interviews_page->post_content;
                    
                    if ($count == 1) :?>

                    <div class="column is-half">
                        <h1 class="title"><?php echo $interviews_title; ?></h1>
                        <div class="solo-flourish-divider">
                            <?php echo file_get_contents(get_stylesheet_directory() . '/img/solo-flourish.svg'); ?>
                        </div>
                        <p class="content"><?php echo $interviews_content; ?></p>
                    </div>

                    <a href="<?php echo $url; ?>" class="column is-half">
                        <div class="image-tile interview">
                            <div class="card-bg" style="background-image: url(<?php echo $image; ?>);"></div>
                            <div class="content has-text-white">
                                <span><?php echo $date; ?></span>
                                <h1 class="title "><?php echo $title; ?></h1>
                                <h1 class="vintner"><span>with </span><?php echo $vintner; ?></h1>
                                <p><?php echo $content; ?></p>
                            </div>
                        </div>

                    </a>

                    <?php endif; 
                        if ($count > 1) : ?>

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
            <?php endif; endwhile; wp_reset_postdata(); $count = 0; ?>

        </div>
        <div class="columns is-mobile is-centered">
            <div class="column is-one-third"><a href="/interviews" class="button is-primary is-fullwidth">Read More Interviews</a></div>
        </div>
    </div>
</section>

<section class="section posts">
    <div class="container">

        <div class="columns is-multiline">

            <?php while ($featured_bottles->have_posts()) : $featured_bottles->the_post();
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
                            <span class="tag is-link is-medium">
                                Featured Bottle
                            </span>
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
                            <span class="tag is-link is-medium">
                                Featured Bottle
                            </span>
                            <div class="card-bg" style="background-image: url(<?php echo $image; ?>);"></div>
                            <div class="content has-text-white">
                                <span><?php echo $vintage; ?></span>
                                <h1 class="title"><?php echo $title; ?></h1>
                                <h1 class="vineyard"><?php echo $vineyard; ?></h1>
                            </div>
                        </div>

                        </a>

                    <?php endif; endwhile; wp_reset_postdata(); ?>

        </div>
        <div class="columns is-mobile is-centered">
            <div class="column is-one-third"><a href="/featured-bottles" class="button is-primary is-fullwidth">More Featured Bottles</a></div>
        </div>
    </div>
</section>

<?php get_footer(); ?>