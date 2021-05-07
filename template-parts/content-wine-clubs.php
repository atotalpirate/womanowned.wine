<?php
/**
 * Template part for displaying page content in content-wine-club.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Women_Owned_Wineries_Sonoma
 */

 // echo '<pre class="white text">';var_dump( $clubID );echo '</pre>';

 $args = array(  
        'post_type' => 'wine-club',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'order' => 'DESC'
    );

    $interviews = new WP_Query( $args ); ?>

<?php  
    $description = get_field('description', 'wine-club-theme');
?>

<section class="interviews section">
    <div class="container">
    <h2 class="title">Wine Club</h2>
        
        <div class="flourish-divider"></div>

        <?php if ($description) : ?>
        <div class="content">
            <?php echo $description; ?>
        </div>
        <?php endif; ?>
        <?php if ($interviews->have_posts()) : ?>

        <div class="columns is-multiline">
            <?php while ($interviews->have_posts()) : $interviews->the_post();
                    $title = get_the_title();
                    $link = get_the_permalink();
                    $clubID = get_field('club_id');
                    $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
                    $excerpt = get_the_excerpt();
                    ?>

            <a href="<?php echo $link.'?clubId='.$clubID; ?>" class="column is-half">
                <div class="card">
                    <div class="card-bg" style="background-image: url(<?php echo $image; ?>);"></div>
                    <div class="card-content has-text-white">
                        <h1 class="title "><?php echo $title; ?></h1>
                        <!-- <div class="meta">
                            <span>Posted on <?php // echo $date; ?></span>
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
    <?php endif; wp_reset_query(); ?>
    </div>
</section>
