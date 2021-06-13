<?php

/**
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Women_Owned_Wineries_Sonoma
 */

get_header();

$interviews_page = get_page_by_path('interviews');

$content = $interviews_page->post_content;
$content_length = strlen($content);

$args = array(
    'post_type' => 'interviews',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'ASC'
);

$interviews = new WP_Query($args); ?>


<section class="interviews section">
    <div class="container">
        <h2 class="title">Interviews</h2>
        <div class="content <?php ($content_length > 500) ? 'has-two-columns' : '' ; ?>">
            <?php echo $content; ?>
        </div>
        <div class="flourish-divider">
            <?php echo file_get_contents(get_stylesheet_directory() . '/img/flourish.svg'); ?>
        </div>

        <?php if ($interviews->have_posts()) : ?>

            <div class="columns is-multiline">
                <?php while ($interviews->have_posts()) : $interviews->the_post();
                    $title = get_the_title();
                    $winery = get_field('winery');
                    $winery_id = $winery->ID;
                    $vintner = get_field('proprietor', $winery_id);
                    $url = get_the_permalink();
                    $date = get_the_date();
                    $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>

                    <a href="<?php echo $url; ?>" class="column is-one-third">

                        <div class="image-tile interview">

                            <span class="tag is-link is-medium">
                                Interview
                            </span>

                            <div class="card-bg" style="background-image: url(<?php echo $image; ?>);"></div>
                            <div class="content has-text-white">
                                <span><?php echo $date; ?></span>
                                <h1 class="title "><?php echo $title; ?></h1>
                                <h1 class="vintner"><?php echo $vintner; ?></h1>
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
<?php endif; ?>
</div>
</section>


<?php get_footer(); ?>