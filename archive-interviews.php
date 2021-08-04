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
                                <?php if ($vintner) : ?>
                                    <h1 class="vintner"><span>with </span><?php echo $vintner; ?></h1>
                                <?php endif; ?> 
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
                                        <?php if ($vintner) : ?>
                                            <h1 class="vintner"><span>with </span><?php echo $vintner; ?></h1>
                                        <?php endif; ?> 
                                    </div>
                                </div>
                                <div class="footer">
                                    <?php echo $content; ?>
                                </div>
                            </div>
                        </a>
            <?php endif; endwhile; wp_reset_postdata(); $count = 0; ?>

        </div>
    </div>
</section>

<?php get_footer(); ?>