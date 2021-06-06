<?php

/**
 * Template Name: Purpose
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Women_Owned_Wineries_Sonoma
 */

// $title

$homeID = get_option('page_on_front');

get_header();

$content = get_the_content();
$content_length = strlen($content); ?>

<section class="section purpose">
    <div class="container">
        <h1 class="title"><?php the_title(); ?></h1>

        <div class="content <?php ($content_length > 500) ? 'has-two-columns' : '' ; ?>">
            <?php the_content(); ?>
        </div>


    </div>
</section>

<?php
$statistic_block_1 = get_field('statistic_block_1', $homeID);
$statistic_block_2 = get_field('statistic_block_2', $homeID);
$statistic_block_3 = get_field('statistic_block_3', $homeID);
?>
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
<section class="section quote">
    <div class="container">
        <div class="block-quote columns">
            <div class="column is-full">
                <h2><?php the_field('quote') ?></h2>
            </div>
        </div>
        <div class="content">
            <?php the_field('content') ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>