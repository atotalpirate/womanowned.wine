<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Women_Owned_Wineries_Sonoma
 */

get_header();

$title = get_the_title();
$date = get_the_date();
$content = get_the_content();
$quote = get_field('quote');
$varietals = wp_get_post_terms($post->ID, 'varietals');
$featured = get_field('featured');
$proprietor = get_field('proprietor');
$ownership = get_field('ownerrship');
$wben = get_field('wben_certified');
$street = get_field('street');
$city = get_field('city');
$state = get_field('state');
$zip = get_field('zip');
$phone = get_field('phone_number');
$website = get_field('website');
$featured_bottles = get_field('featured_bottles');
$social_links = get_field_object('social_links');


$image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
$featured_image_caption = get_field('featured_image_caption');

// echo '<pre class="white text">';var_dump($featured_bottles);echo '</pre>';

?>

<section class="section feature winery">

    <div class=container>

        <div class="tile is-ancestor">
            <div class="tile is-vertical is-full">
                <div class="tile">
                    <div class="intro tile is-parent is-vertical is-7">
                        <article class="tile is-child">
                            <h1 class="title"><?php echo $title; ?></h1>
                            <h3 class="title">
                                <?php echo $proprietor; ?>
                            </h3>
                            <?php if ($wben) : ?>
                                <span class="icon verified is-medium">
                                    <span class="fa-stack fa-sm">
                                        <i class="fas fa-certificate fa-stack-2x has-text-info"></i>
                                        <i class="fas fa-check fa-stack-1x has-text-white"></i>
                                        <p class="has-text-info">WBENC</p>
                                    </span>
                                </span>
                            <?php endif; ?>

                            <?php if ($varietals) : ?>
                                <div class="tags">
                                    <?php foreach ($varietals as $key => $varietal) : ?>
                                        <span class="tag is-dark"><?php echo $varietal->name; ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <ul class="address">
                                <?php
                                if ($street || $city || $state || $zip) {
                                    echo '<li>';
                                    echo '<span class="icon"><i class="fas fa-map-marker-alt"></i></span>';
                                    echo ($street) ? '<span>' . $street . '</span><br>' : '';
                                    echo ($city) ? '<span>' . $city . '</span>' : '';
                                    echo ($state) ? '<span>' . $state['value'] . '</span>' : '';
                                    echo ($zip) ? '<span>' . $zip . '</span>' : '';
                                    echo '</li>';
                                } ?>
                            </ul>
                            <div class="content">
                                <?php the_content(); ?>
                            </div>
                            <p class="buttons">
                                <?php echo ($phone) ? '<a href="tel:' . sanitize_phone($phone) . '" class="phone button is-rounded is-outlined"><span class="icon"><i class="fas fa-phone"></i></span>' . sanitize_phone($phone) . '<a/>' : ''; ?>
                                <?php echo ($website) ? '<a href="' . $website . '" class="website button is-rounded is-outlined" target=_blank><span class="icon"><i class="fas fa-globe"></i></span>Visit website</a>' : ''; ?>

                                <?php if ($social_links['value']) : ?>

                                    <?php foreach ($social_links['value'] as $key => $link) : ?>
                                        <a href="<?php echo $link; ?>" class="social button is-rounded is-outlined" target="_blank">
                                            <span class="icon is-small">
                                                <i class="fab fa-<?php echo $key; ?>"></i>
                                            </span>
                                        </a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </p>
                        </article>
                    </div>
                    <div class="tile is-vertical is-parent">
                        <article class="tile is-child">
                            <div class="featured-image">
                                <figure class="image">
                                    <img src="<?php echo $image; ?>" alt="">
                                </figure>

                                <?php if ($featured_image_caption) : ?>
                                    <small class="has-text-centered"><?php echo $featured_image_caption; ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="tile is-child featured-bottles">
                                <?php if ($featured_bottles) : ?>
                                    <h3>Featured Bottles</h3>
                                        <div class="columns is-multiline">
                                        <?php foreach ($featured_bottles as $key => $bottle) :
                                            $bottle_img = wp_get_attachment_url(get_post_thumbnail_id($bottle->ID));
                                            $bottle_title = get_the_title($bottle->ID);
                                            $bottle_term = wp_get_post_terms($bottle->ID, 'varietals');
                                            $bottle_url = get_the_permalink($bottle->ID);
                                            //  echo '<pre class="white text">';var_dump($bottle_img);echo '</pre>'; 
                                        ?>
                                            <a href="<?php echo $bottle_url; ?>" class="column is-one-third">
                                                <figure class="image">
                                                    <img class="is-rounded" src="<?php echo $bottle_img; ?>">
                                                </figure>
                                                <h3><?php echo $bottle_title; ?></h3>
                                                <h4><?php echo $bottle_term[0]->name; ?></h4>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </article>
                    </div>
                </div>
            </div>
        </div>

        <?php if (have_rows('segment')) : while (have_rows('segment')) : the_row();

                $title = get_sub_field('title');
                $title_format = get_sub_field('title_format');
                $content = get_sub_field('content');
                $photo = get_sub_field('photo');
                $photo_caption = get_sub_field('photo_caption');
                $block_quote = get_sub_field('block_quote');
                $counter++;
        ?>

                <?php if ($block_quote) : ?>
                    <div class="block-quote columns">
                        <div class="column is-full">
                            <h2><?php echo $block_quote; ?></h2>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($photo || $title || $content) : ?>
                    <div class="segment columns is-multiline">
                        <div class="column is-half">

                            <div class="segment-title <?php echo ($title_format == 'question') ? 'has-text-right' : 'has-text-left'; ?>">
                                <p class="has-text-weight-bold"><?php echo $title; ?></p>
                            </div>
                            <div>
                                <div class="answer content">
                                    <?php echo $content; ?>
                                </div>
                            </div>
                        </div>

                        <?php if ($photo) : ?>
                            <div class="figure column is-one-quarter">
                                <div class="sticky">
                                    <figure id="modal_<?php echo $counter; ?>" class="expander image">
                                        <img src="<?php echo $photo; ?>" alt="">
                                    </figure>
                                    <?php if ($photo_caption) : ?>
                                        <small><?php echo $photo_caption; ?></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="modal expanded-image modal_<?php echo $counter; ?>">
                                <div class="modal-background"></div>
                                <div class="modal-content">
                                    <figure class="image">
                                        <img src="<?php echo $photo; ?>" alt="<?php echo $photo_caption; ?>">
                                    </figure>
                                    <div class="content">
                                        <?php echo $photo_caption; ?>
                                    </div>
                                </div>
                                <button class="modal-close is-large" aria-label="close"></button>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>

            <?php endwhile; ?>
        <?php endif; ?>

    </div>

</section>

<?php
get_footer();
