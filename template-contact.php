<?php

/**
 * Template Name: Contact
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Women_Owned_Wineries_Sonoma
 */

get_header(); 

$content = get_the_content();
$content_length = strlen($content); ?>


<section class="section contact">
    <div class="container">
        <h1 class="title"><?php the_title(); ?></h1>

        <div class="content <?php ($content_length > 500) ? 'has-two-columns' : '' ; ?>">
            <?php echo the_content(); ?>
        </div>

        <?php if (have_rows('accordion')) : ?>
        
        <dl class="accordion">

            <?php while (have_rows('accordion')) : the_row();

                $question = get_sub_field('question');
                $answer = get_sub_field('answer'); ?>

                <dt>
                    <span class="icon">
                        <i class="fas fa-caret-right" aria-hidden="true"></i>
                    </span>
                    <a href=""><?php echo $question; ?></a>
                </dt>
                <dd><?php echo $answer; ?></dd>

            <?php endwhile; ?>
        
        </dl>

        <?php endif; ?>

        <div class="flourish-divider">
            <?php echo file_get_contents(get_stylesheet_directory() . '/img/flourish.svg'); ?>
        </div>

        <?php echo do_shortcode('[contact-form-7 title="Contact Page"]'); ?>

    </div>

</section>


<?php get_footer(); ?>