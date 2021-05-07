<?php

/**
 * Front page template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cohs
 */

$image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

// stats - info-bar
$statistic_block_1 = get_field('statistic_block_1');
$statistic_block_2 = get_field('statistic_block_2');
$statistic_block_3 = get_field('statistic_block_3');

get_header();

// Homepage variables
$tagline = get_field('tagline');
?>

<section class="masthead hero is-fullheight">
    <!-- <div class="overlay"></div> -->
    <div class="hero-head"></div>
    <div class="hero-body">
        <div class="container">
            <div class="columns">
                <div class="text column is-half">
                    <h1 class="title">
                        <?php echo $tagline; ?>
                    </h1>

                    <?php the_content(); ?>

                    <?php get_search_form(); ?>
                </div>
                <div class="column is-half">

                    <figure class="image is-square">
                        <svg width="676" height="681" viewBox="0 0 676 681" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <clipPath id="user-space" clipPathUnits="userSpaceOnUse">
                                    <path d="M673.4 354.411C673.9 352.411 674.1 349.011 674 343.911C673.7 333.911 670.6 332.711 671 326.911C671.4 321.111 668.8 308.411 669 302.911C669.1 299.111 666.7 294.311 665.3 290.811C665.3 289.711 665.3 288.511 665.4 287.811L664.7 286.911C664.5 284.711 664.4 283.011 664.4 281.611C664.4 280.311 664.5 279.211 664.6 278.411C664.8 276.711 665 275.511 664.8 273.211C664.7 273.211 664.6 273.411 664.5 273.511L664.8 274.011C664.6 274.511 664.4 274.311 664.2 273.811C663.9 274.011 663.6 273.611 663.2 271.211L663.4 271.611C662.4 268.011 661.2 261.611 660.5 258.911L661.7 258.511C661.2 257.811 660.7 256.511 660.2 254.911C659.7 253.311 659.1 251.311 658.5 249.011C657.3 244.511 656 238.911 654.5 233.311C651.5 222.111 647.9 210.611 646.1 206.511C643.7 197.611 637.1 188.311 632.3 177.911C628.1 169.911 627.2 167.711 627.1 166.511C627 165.211 627.5 164.911 625.5 160.711C620 150.611 625.5 163.411 623 159.611C621.1 155.411 619 151.311 616.9 147.211C621.5 153.711 619.7 149.811 619.3 148.311C616 143.311 612 136.711 608.1 131.211C604.2 125.711 600.4 121.411 598.3 120.811C593.4 114.311 590.9 111.011 589.2 108.711C587.5 106.311 586.4 104.911 584 102.411C585.4 104.311 588.3 107.911 588 108.311C584.2 102.911 585.6 106.311 587.3 108.311C583.5 105.111 575.1 95.4111 566.7 87.1111C562.5 82.9111 558.4 79.0111 555.1 76.2111C551.8 73.4111 549.4 71.7111 548.5 71.9111L548.8 71.5111C545.8 71.7111 547.5 75.4111 541.4 72.1111C540.4 71.0111 539.3 69.8111 538.3 68.7111C536.3 67.6111 534.3 66.5111 532.2 65.4111C528.8 62.3111 530.9 63.1111 531.1 62.9111C526.2 60.1111 520.7 56.4111 514.8 52.6111C508.9 48.8111 502.7 44.9111 496.7 41.6111C500.1 45.4111 503.5 49.3111 506.7 53.2111C502.1 49.8111 495.6 45.2111 489.7 41.7111C483.8 38.2111 478.7 35.6111 477.3 36.0111C475.5 34.5111 473.6 33.0111 471.8 31.6111C466.9 28.6111 463.4 26.8111 460.9 25.8111C458.4 24.8111 456.8 24.5111 455.6 24.4111C453.2 24.2111 452.4 25.0111 448.2 23.0111C444.8 21.1111 441.3 19.3111 437.8 17.6111C441.5 18.7111 445.1 19.9111 448.7 21.2111C443.4 18.8111 439.7 17.3111 436.2 15.8111C432.7 14.3111 429.5 12.9111 425.2 11.1111H425.1C425.7 11.3111 426.1 11.5111 426.1 11.7111L424.5 11.3111C422.9 11.9111 416.9 11.1111 408.8 9.41111C403 8.41111 397.9 7.91111 391.9 7.21111C385.9 6.51111 379.1 5.61111 370 4.01111L365.3 5.71111C360.7 5.11111 356.2 4.51111 351.6 4.01111V2.41111C358.4 2.61111 368.1 2.81111 378.4 3.61111C388.7 4.31111 399.5 5.71111 408.2 7.31111L408.6 6.61111C398.3 4.61111 386.4 3.91111 379.5 3.21111C376.6 2.61111 369.7 0.811111 372.4 0.0111111C370.8 0.311111 369.1 0.611111 367.5 0.911111C358.8 0.411111 352.3 0.411111 346.9 0.311111C341.5 0.311111 337.2 0.211111 332.8 0.211111C328.4 0.111111 323.9 0.111111 318.3 0.0111111C312.7 0.0111111 305.8 -0.0888889 296.6 0.311111L299.8 0.811111C292.6 1.81111 285.4 3.21111 283.2 2.31111C277.8 2.81111 272.2 3.71111 266.7 4.81111C261.3 5.91111 256 7.01111 251 8.11111C240.9 10.4111 231.9 12.8111 224.8 14.4111C224 15.4111 223.3 16.3111 222.5 17.3111C218.1 18.8111 210.6 18.9111 209.6 22.2111C206.7 23.8111 203.8 25.3111 200.9 27.0111C198 28.2111 195.8 29.6111 193.5 30.8111C191.1 32.1111 188.7 33.3111 185.2 34.5111C184.8 34.6111 184.3 34.8111 183.9 34.9111C183.9 35.0111 184 35.0111 184 35.0111C177.4 38.0111 177.7 38.4111 177.7 38.9111C177.7 39.4111 177.4 39.8111 170 43.5111C164.8 45.1111 166.2 48.5111 159.3 52.4111C156.6 53.1111 153.8 53.8111 151.1 54.6111C144.7 58.0111 141.4 60.8111 137.6 64.2111C133.8 67.6111 129.6 71.7111 121.6 78.5111C113.3 84.3111 108.2 86.1111 111.8 80.0111C109.2 84.0111 108.7 85.0111 107.8 86.2111C106.9 87.4111 105.6 88.6111 101.6 93.3111C99.5 93.9111 100.3 92.8111 101.6 90.3111C97.3 93.7111 96.2 95.1111 95.6 96.3111C94.9 97.5111 94.6 98.6111 91.7 101.611C91.5 104.711 91.8 108.711 90.2 110.811L92.8 108.911C90.3 112.411 87.6 116.011 84.7 119.611C81.8 123.211 78.6 126.811 75.2 130.511L74.7 129.611C72.6 132.511 70.6 135.511 68.7 138.511L67.3 138.311C64.4 142.611 61.7 146.911 59.1 151.211L60.5 149.611C59.6 151.111 57.7 154.511 55.5 158.111C53.4 161.711 51 165.711 49.1 168.411L48.6 167.911C43.1 175.611 39.3 183.411 35.9 191.611C32.5 199.811 29.2 208.611 25.2 218.811L25 215.611C22.9 218.811 23.2 219.511 23.5 220.411C23.8 221.311 24.1 222.311 22.2 226.411L20.4 226.211C19.7 234.411 16.4 235.711 13.9 240.711C14.9 240.111 15.9 239.511 16.8 238.911C15.6 242.111 14.4 245.411 13.2 248.711C11.3 254.111 10.2 255.711 9.4 255.611C8.6 255.511 8.2 253.811 7.9 252.811C7.8 255.511 7.7 258.211 7.7 260.911L5.4 262.011C5.9 265.111 5.5 266.511 4.9 268.411C4.3 270.311 3.4 272.711 3.2 277.811C2.3 278.511 2.3 275.911 1.4 279.211C1.4 284.911 1.6 290.511 2 296.011C1.9 292.711 1.9 289.311 2 286.011L4.7 287.611C5.1 292.911 4.7 296.311 4.1 299.311C3.5 302.411 2.9 305.111 3 308.711C2.8 307.011 2.7 305.311 2.5 303.611C2.4 309.611 2.1 312.711 1.6 315.211C1.2 317.711 0.6 319.511 0.2 322.811C0.8 320.711 1.7 317.611 1.9 322.411C1.9 325.911 0.8 324.311 0.4 327.611C1.4 328.011 2 330.411 2.4 333.511C2.6 335.111 2.7 336.911 2.7 338.811C2.7 340.711 2.6 342.711 2.4 344.611C2.1 344.511 1.8 344.311 1.7 343.811C2.1 345.811 2.6 346.811 2.2 350.311L0 348.311C0.7 350.511 1.5 352.711 2.3 354.911C1.8 359.511 3.9 365.811 2.4 365.311L1.8 362.811C2.4 374.011 3.6 385.211 5.3 396.311L3.7 397.111C5.2 398.511 5.7 403.111 6.4 407.111C7.1 411.111 7.7 414.511 9.1 413.611C9 416.911 10.6 422.711 11.9 427.511C13.1 432.211 14 435.911 11.9 434.511C14.6 445.111 17.8 453.111 21.3 461.611C24.9 470.111 28.7 479.211 34.1 491.811C34.9 496.711 38.5 504.911 43.4 513.611C48.2 522.311 54.2 531.511 59 538.811C64.1 545.711 69 551.711 74 557.311C79 563.011 84 568.111 89.1 573.011C99.4 582.711 110.2 591.811 123.5 602.111C125.2 604.111 127 606.011 129.1 608.011C131.2 610.011 133.5 611.911 135.9 613.811C140.8 617.611 146.2 621.211 151.9 624.711C163.1 631.611 175 637.611 184.4 643.711C186.5 644.211 188.5 644.611 190.6 645.111C202.7 653.811 223.9 660.511 243.2 669.311C248.3 670.311 251 670.811 252.2 671.111C251.3 670.811 250 670.011 249.8 669.011C252.6 670.211 257 671.411 260.5 672.411C264.1 673.411 266.8 674.311 266.1 675.211L264.5 675.011C263.8 675.911 268.4 676.711 274 677.511C279.6 678.311 286 678.911 289.2 680.211L285.8 677.611C289.5 678.211 293.3 678.811 297 679.311L293.9 679.411C306.1 679.511 316.5 679.611 326.1 679.611C335.6 679.711 344 680.011 352.6 680.111C361.1 680.211 369.6 680.211 378.9 679.411C388.1 678.611 398.1 677.111 409.2 673.911C406.4 675.611 408.6 674.911 411.6 674.011C414.6 673.111 418.4 672.011 419 673.211C425.1 673.411 430.4 671.811 435.2 669.711C440 667.611 444.2 664.911 448.5 662.911C448.5 662.811 448.5 662.611 449 662.211C454.2 660.411 459.3 658.511 464.4 656.511C460.5 659.911 463 658.111 465.5 656.311C468 654.411 470.6 652.511 467 655.511C477 651.911 487.5 647.311 498.1 642.211C508.8 637.111 519.9 631.211 530.8 624.411C536.3 621.011 541.7 617.411 547.1 613.511C549.8 611.611 552.4 609.511 555 607.511C557.6 605.411 560 603.411 562.5 601.311C572.4 592.911 581.7 584.111 590.5 575.311L588.4 576.311C592.8 571.811 597.4 566.411 601.7 561.311C603.9 558.711 605.9 556.311 607.9 554.011C608.9 552.911 609.9 551.811 610.8 550.711C611.7 549.711 612.7 548.711 613.5 547.811C617 544.311 619.6 539.611 621.5 535.411C623.4 531.211 624.7 527.511 625.6 525.911C627.7 521.111 630.5 516.911 632.5 514.511C634 512.611 635.1 511.711 634.9 512.311C639.6 502.611 641.8 492.311 649.2 479.511C651.5 477.711 655.4 468.011 658.6 458.611C661.9 449.211 664.3 440.211 665.9 440.511L665.7 440.311C670 431.311 672.3 421.611 674 411.811C675.3 404.511 674.3 392.111 675.6 384.511C675.6 376.111 674.8 365.611 673.4 354.411ZM664.2 287.911C664.1 287.611 664.1 287.211 664.1 287.011C664.2 287.311 664.2 287.611 664.2 287.911Z" fill="#202020" />
                                </clipPath>
                            </defs>

                            <g class="masthead-images">
                                <?php if (have_rows('images')) : while (have_rows('images')) : the_row(); ?>

                                        <image width="100%" height="100%" preserveAspectRatio="xMinYMin slice" xlink:href="<?php the_sub_field('image'); ?>" clip-path="url(#user-space)" />

                                    <?php endwhile;
                                else : ?>

                                    <image width="100%" height="100%" preserveAspectRatio="xMinYMin slice" xlink:href="<?php echo $image; ?>" clip-path="url(#user-space)" />

                                <?php endif; ?>
                            </g>
                        </svg>
                    </figure>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="info-bar section has-text-white">
    <div class="container">
        <nav class="level">
            <div class="level-item has-text-centered">
                <div>
                    <p class="title"><?php echo $statistic_block_1['figure']; ?></p>
                    <p class="heading"><?php echo $statistic_block_1['description']; ?></p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="title"><?php echo $statistic_block_2['figure']; ?></p>
                    <p class="heading"><?php echo $statistic_block_2['description']; ?></p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                    <p class="title"><?php echo $statistic_block_3['figure']; ?></p>
                    <p class="heading"><?php echo $statistic_block_3['description']; ?></p>
                </div>
            </div>
        </nav>
    </div>
    <?php echo file_get_contents(get_stylesheet_directory() . '/img/bar.svg'); ?>
</section>

<?php $args = array(
    'post_type' => 'wine-club',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'DESC'
);

$interviews = new WP_Query($args);
$description = get_field('description', 'wine-club-theme');
?>

<section class="how-we-work section">
    <div class="container">
        <h2 class="title">How We Work</h2>

        <div class="flourish-divider">
            <?php echo file_get_contents(get_stylesheet_directory() . '/img/flourish.svg'); ?>
        </div>

        <div class="columns is-variable is-8 has-text-centered">
            <div class="column is-one-third">
                <span class="icon has-text-dark is-size-1">
                    <i class="fas fa-hands-helping"></i>
                </span>
                <h3>Connecting</h3>
                <p>We invite wine lovers to find and support independent women producers.</p>
            </div>
            <div class="column is-one-third">
                <span class="icon has-text-dark is-size-1">
                    <i class="fas fa-book-reader"></i>
                </span>
                <h3>Storytelling</h3>
                <p>We share unsung perspectives from the hardworking women behind your favorite bottles</p>
            </div>
            <div class="column is-one-third">
                <span class="icon has-text-dark is-size-1">
                    <i class="fas fa-mountain"></i>
                </span>
                <h3>Elevating</h3>
                <p>We foster community and build resources to help level the playing field in a heavily male-dominated industry.</p>
            </div>
        </div>
</section>

<section class="wine-club section">
    <div class="container">
        <h2 class="title">Wine Club</h2>

        <div class="flourish-divider">
            <?php echo file_get_contents(get_stylesheet_directory() . '/img/flourish.svg'); ?>
        </div>

        <?php if ($description) : ?>
            <div class="content">
                <?php echo $description; ?>
            </div>
        <?php endif; ?>
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
</section>

<?php if (have_rows('testimonials')) : ?>
<h2 class="title testimonial-title has-text-centered">Why People Love Us.</h2>
<section class="testimonials info-bar section has-text-white">
    <div class="container">

        <div class="splide" data-splide='{"type":"loop","perPage":1,"arrows":false,"autoplay":true,"interval": 6000}'>
            <div class="splide__track">
                <ul class="splide__list">
                <?php while (have_rows('testimonials')) : the_row();
                    $name = get_sub_field('name');
                    $organization = get_sub_field('organization');
                    $testimonial = get_sub_field('testimonial'); ?>
                    <li class="splide__slide">
                        <div class="content">
                            <span class="testimonial">
                                <?php echo $testimonial; ?>
                            </span>
                            <span class="person has-text-centered">
                                <span class="name"><?php echo $name; ?></span>
                                <?php echo ($organization) ? '<span class="organization">'.$organization.'</span>' : '' ; ?>
                            </span>
                        </div>
                    </li>
                <?php endwhile; ?>
                </ul>
            </div>
        </div>

    </div>
    <?php echo file_get_contents(get_stylesheet_directory() . '/img/bar.svg'); ?>
</section>

<?php endif; ?>


<?php if (have_rows('press_gallery')) : ?>

    <section class="press-gallery section">
        <div class="container">
            <h2 class="title has-text-centered">Featured In...</h2>

            <div class="flourish-divider">
                <?php echo file_get_contents(get_stylesheet_directory() . '/img/flourish.svg'); ?>
            </div>

            <div class="columns is-multiline">
                <?php while (have_rows('press_gallery')) : the_row();
                    $logo = get_sub_field('logo');
                    $url = get_sub_field('url'); ?>
                    <div class="column is-one-third">
                        <a href="<?php echo $url; ?>" target="_blank">
                            <img src="<?php echo $logo; ?>" alt="">
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php get_footer(); ?>