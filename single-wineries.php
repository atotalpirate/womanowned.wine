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
$interview = get_field('interview');
$social_links = get_field_object('social_links');

$image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
$featured_image_caption = get_field('featured_image_caption');

// echo '<pre class="white text">';var_dump($featured_bottles);echo '</pre>';

?>

<section class="section feature winery">

    <div class=container>
        
        <div class="columns is-multiline">
            
            <div class="column is-two-thirds">
                <div class="columns">
                    <div class="column is-one-third">
                        <figure class="logo image">
                            <img class="is-rounded" src="<?php echo $image; ?>" alt="">
                        </figure>
                    </div>

                    <div class="column">
                        <h1 class="title"><?php echo $title; ?></h1>
                        <h3 class="title">
                            <?php echo $proprietor; ?>
                        </h3>
                    </div>
                </div>

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

                <?php if ($varietals) : ?>
                    <div class="tags">
                        <?php foreach ($varietals as $key => $varietal) : ?>
                            <span class="tag is-dark is-rounded"><?php echo $varietal->name; ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <div class="content">
                    <?php the_content(); ?>
                </div>

                <div class="contact">
                    <?php echo ($phone) ? '<a href="tel:' . sanitize_phone($phone) . '" class="phone button is-rounded is-outlined"><span class="icon"><i class="fas fa-phone"></i></span>' . sanitize_phone($phone) . '<a/>' : ''; ?>
                    <?php echo ($website) ? '<a href="' . $website . '" class="website button is-rounded is-outlined" target=_blank><span class="icon"><i class="fas fa-globe"></i></span>Visit website</a>' : ''; ?>
                </div>

                <div class="socials">
                    <?php if ($social_links['value']) : ?>
                        <?php foreach ($social_links['value'] as $key => $link) : ?>
                            <?php if ($link) : ?>
                                <a href="<?php echo $link; ?>" class="social is-rounded is-outlined" target="_blank">
                                    <span class="icon is-small">
                                        <i class="fab fa-<?php echo $key; ?>"></i>
                                    </span>
                                </a>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="column is-one-third">
                <div class="featured">
                
                    <?php
                        $image_gallery = get_field('image_gallery');

                        if ($image_gallery) : ?>
                        
                            <div class="splide">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        <?php while (have_rows('image_gallery')) : the_row();
                                            $image = get_sub_field('image');?>
                                            <li class="splide__slide">
                                                <div class="splide__slide__container">
                                                    <img src="<?php echo $image; ?>" alt="">
                                                </div>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            </div>

                    <?php endif; ?>

                    <?php if ($featured_bottles) : ?>
                        <span>
                            <h3 class="featured-title">Featuring</h3>
                        </span>
                            <div class="columns is-multiline">

                            <?php foreach ($featured_bottles as $key => $bottle) :
                                $bottle_img = wp_get_attachment_url(get_post_thumbnail_id($bottle->ID));
                                $bottle_title = get_the_title($bottle->ID);
                                $bottle_term = wp_get_post_terms($bottle->ID, 'varietals');
                                $bottle_url = get_the_permalink($bottle->ID);
                                $bottle_vintage = get_field('vintage', $bottle->ID);
                            ?>
                                <a href="<?php echo $bottle_url; ?>" class="column is-full columns is-multiline">
                                    <div class="column is-one-third">
                                        <figure class="image">
                                            <img class="is-rounded" alt="photo of <?php echo $bottle_title; ?>" src="<?php echo $bottle_img; ?>">
                                        </figure>
                                    </div>
                                    <div class="meta column">
                                        <h3 class="vintage"><?php echo $bottle_vintage; ?></h3>
                                        <h3><?php echo $bottle_title; ?></h3>
                                        <h3 class="varietal"><?php echo $bottle_term[0]->name; ?></h3>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($interview) :
                        $interview_ID = $interview->ID;
                        $interview_url = get_permalink($interview_ID);
                        $interview_date = get_the_date('M d, Y', $interview_ID);
                        $interview_title = $interview->post_title;
                        $interview_img = wp_get_attachment_url(get_post_thumbnail_id($interview_ID));;
                        $interview_winery = get_field('winery', $interview_ID);
                        $interview_winery_id = $interview_winery->ID;
                        $interview_winery_proprietor = get_field('proprietor', $interview_winery_id)
                         ?>

                        <span>
                            <h3 class="featured-title">Interview</h3>
                        </span>
                        <div class="columns is-multiline">
                            <a href="<?php echo $interview_url; ?>" class="column is-full columns is-multiline">
                                <div class="column is-one-third">
                                    <figure class="image">
                                        <img class="is-rounded" alt="photo of " src="<?php echo $interview_img; ?>">
                                    </figure>
                                </div>
                                <div class="meta column">
                                    <h3 class="vintage"><?php echo $interview_date; ?></h3>
                                    <h3><?php echo $interview_title; ?></h3>
                                    <h3 class="varietal">with <?php echo $interview_winery_proprietor; ?></h3>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

</section>

<?php
get_footer(); ?>
