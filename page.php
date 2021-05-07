<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Women_Owned_Wineries_Sonoma
 */

$library_logo = get_field('library_logo', 'option');
$icon = get_field('icon');
get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="header section">
    <div class="container">
        <h2 class="title">
            <?php the_title(); ?>
        </h2>
    
        <div class="content">
            <?php the_content(); ?>
        </div>
    </div>
</section>

<?php endwhile; endif; ?>

<?php get_footer(); ?>