<?php

/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Women_Owned_Wineries_Sonoma
 */

get_header();

$args = array(
    'post_type' => 'wine-club',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'DESC',
    'meta_key' => 'featured',
    'meta_value' => true
);

$wine_club_page = get_page_by_path('wine-club');

$content = $wine_club_page->post_content;
$content_length = strlen($content);
$title = get_the_title( $wine_club_page->ID );
// echo '<pre class="white text">';var_dump( $wine_club_page->ID );echo '</pre>';

$clubs = new WP_Query($args); ?>

<section class="interviews section">
    <div class="container">
        <h2 class="title"><?php echo $title; ?></h2>
        
        <?php if ($content) : ?>
            <div class="content <?php ($content_length > 500) ? 'has-two-columns' : '' ; ?>"> 
                <?php echo $content; ?>
            </div>
        <?php endif; ?>

        <div class="flourish-divider">
            <?php echo file_get_contents(get_stylesheet_directory() . '/img/flourish.svg'); ?>
        </div>

        <?php if ($clubs->have_posts()) : ?>

            <div class="columns is-multiline">
                <?php while ($clubs->have_posts()) : $clubs->the_post(); $count++; endwhile; ?>
                <?php while ($clubs->have_posts()) : $clubs->the_post();
                    $featured = get_field('featured');
                    $title = get_the_title();
                    $subtitle = get_field('subtitle');
                    $date = get_the_date();
                    $link = get_the_permalink();
                    $clubID = get_field('club_id');
                    $featured_bottles = get_field('featured_bottles');
                    $image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                    $excerpt = get_the_excerpt();
                ?>

                    <div class="column <?php echo ($count > 2) ? 'is-one-third' : 'is-half'; ?>">
                        <div class="card wine-club">
                            <a href="<?php echo $link . '?clubId=' . $clubID; ?>" class="card-image">
                                <?php if ($end_date) : ?>
                                    <div class="tag is-medium is-rounded">Ends on <?php echo $end_date; ?></div>
                                <?php endif; ?>
                                <figure class="image is-4by3">
                                    <img src="<?php echo $image; ?>" alt="<?php echo $image_alt; ?>" title="<?php echo $image_title; ?>">
                                </figure>
                                <p class="title">
                                    <?php echo $title; ?>
                                    <?php echo ($subtitle) ? "<span class='subtitle'>" . $subtitle . "</span>" : '' ; ?>
                                </p>
                            </a>
                            <div class="card-content">
                                <div class="content">
                                    <?php echo $excerpt; ?>
                                </div>
                            </div>
                            <footer class="card-footer <?php echo $featured_bottles ? "has-featured" : "" ; ?>">
                                <?php if ($featured_bottles) : ?>
                                    <span class="featured-title">includes</span>
                                    <span class="featured-bottles">
                                        <?php foreach ($featured_bottles as $key => $bottle) :
                                            $bottle_img = wp_get_attachment_url(get_post_thumbnail_id($bottle->ID));
                                            $bottle_title = get_the_title($bottle->ID);
                                            $bottle_term = wp_get_post_terms($bottle->ID, 'varietals');
                                            $bottle_url = get_the_permalink($bottle->ID);
                                            //  echo '<pre class="white text">';var_dump($bottle_img);echo '</pre>'; 
                                        ?>
                                            <a href="<?php echo get_the_permalink($bottle->ID); ?>" class="image">
                                                <img class="is-rounded" alt="Permalink for <?php echo $bottle_title; ?>" src="<?php echo $bottle_img; ?>">
                                            </a>
                                        <?php endforeach; ?>
                                    </span>
                                <?php endif; ?>
                                <a href="<?php echo $link . '?clubId=' . $clubID; ?>" class="button is-primary is-rounded">
                                    <span class="icon is-small">
                                        <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </footer>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
    </div>
<?php else : ?>
    <div class="empty">
        <h2 class="title has-text-centered">Currently, there are no available wine clubs.</h2>
    </div>
<?php endif;
        wp_reset_query(); ?>
</div>
</section>

<?php get_footer(); ?>