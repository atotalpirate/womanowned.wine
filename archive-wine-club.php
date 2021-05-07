<?php

/**
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
    'post_type' => 'wine-club',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'DESC'
);

$interviews = new WP_Query($args); ?>

<?php
$description = get_field('description', 'wine-club-theme');
?>

<section class="interviews section">
    <div class="container">
        <h2 class="title">Thirsty for change? <br>Join the Club!</h2>
        <?php if ($description) : ?>
            <div class="content">
                <?php echo $description; ?>
            </div>
        <?php endif; ?>

        <div class="flourish-divider">
            <?php echo file_get_contents(get_stylesheet_directory() . '/img/flourish.svg'); ?>
        </div>

        <?php if ($interviews->have_posts()) : ?>

            <div class="columns is-multiline">
                <?php while ($interviews->have_posts()) : $interviews->the_post();
                    $title = get_the_title();
                    $date = get_the_date();
                    $link = get_the_permalink();
                    $clubID = get_field('club_id');
                    $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                    $excerpt = get_the_excerpt();
                ?>

                    <a href="<?php echo $link . '?clubId=' . $clubID; ?>" class="column is-half">
                        <div class="card">
                            <div class="card-bg" style="background-image: url(<?php echo $image; ?>);"></div>
                            <div class="card-content has-text-white">
                                <h1 class="title "><?php echo $title; ?></h1>
                                <!-- <div class="meta">
                        <span>Posted on <?php // echo $date; 
                                        ?></span>
                    </div> -->
                                <div class="content has-text-white">
                                    <?php echo $excerpt; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
    </div>
<?php else : ?>
    <div class="empty">
        <h2 class="subtitle has-text-centered">No interviews yet.</h2>
    </div>
<?php endif;
        wp_reset_query(); ?>
</div>
</section>

<?php get_footer(); ?>