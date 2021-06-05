<?php

/**
 * Template Name: Interviews
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Women_Owned_Wineries_Sonoma
 */

get_header();

/**
 * Setup query to show the ‘services’ post type with ‘8’ posts.
 * Output the title with an excerpt.
 */
$args = array(
    'post_type' => 'featured-bottles',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'ASC'
);

$interviews = new WP_Query($args); ?>


<section class="interviews section">
    <div class="container">
        <h2 class="title">Featured Bottles</h2>
        <div class="content">
            <?php the_field('description', 'featured-bottles-theme') ?>
        </div>
        <div class="flourish-divider">
            <?php echo file_get_contents(get_stylesheet_directory() . '/img/flourish.svg'); ?>
        </div>

        <?php if ($interviews->have_posts()) : ?>

            <div class="columns is-multiline">
                <?php while ($interviews->have_posts()) : $interviews->the_post();
                    $title = get_the_title();
                    $url = get_the_permalink();
                    $date = get_the_date();
                    $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>

                    <a href="<?php echo $url; ?>" class="column is-one-third">
                        <div class="image-tile featured-bottle">
                            <div class="card-bg" style="background-image: url(<?php echo $image; ?>);"></div>
                            <div class="card-content has-text-white">
                                <h1 class="title "><?php echo $title; ?></h1>
                                <div class="meta">
                                    <span>Posted on <?php echo $date; ?></span>
                                </div>
                                <div class="content has-text-white">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
    </div>
<?php else : ?>
    <div class="empty">
        <h2 class="subtitle has-text-centered">No bottles yet.</h2>
    </div>
<?php endif; ?>
</div>
</section>


<?php get_footer(); ?>