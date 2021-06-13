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
    'order' => 'ASC'
);

$interviews = new WP_Query($args); ?>


<section class="interviews section">
    <div class="container">
        <h2 class="title">Featured Bottles</h2>
        <div class="content <?php ($content_length > 500) ? 'has-two-columns' : '' ; ?>"> 
            <?php echo $content; ?>
        </div>
        <div class="flourish-divider">
            <?php echo file_get_contents(get_stylesheet_directory() . '/img/flourish.svg'); ?>
        </div>

        <?php if ($interviews->have_posts()) : ?>

            <div class="columns is-multiline">
                <?php while ($interviews->have_posts()) : $interviews->the_post();
                    $vintage = get_field('vintage');
                    $title = get_the_title();
                    $date = get_the_date();
                    $vineyard = get_field('vineyard');
                    $url = get_the_permalink();
                    $date = get_the_date();
                    $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                    $winery = get_field('featured_winery');
                    $interview = get_field('interview');
                    $interview_icon = '<span class="tag is-dark is-medium is-rounded"><span class="icon"><i class="fas fa-comment-dots"></i></span></span>'; 
                    $winery_icon = '<span class="tag is-dark is-medium is-rounded"><span class="icon"><i class="fas fa-wine-bottle"></i></span></span>';  ?>


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