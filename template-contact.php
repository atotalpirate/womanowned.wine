<?php

/**
 * Template Name: Contact
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Women_Owned_Wineries_Sonoma
 */

get_header(); ?>


<section class="section people">
    <div class="container">
        <h1 class="title"><?php the_title(); ?></h1>

        <div class="content">
            <?php echo the_content(); ?>
        </div>

        <?php if (have_rows('accordion')) : ?>
        
        <dl class="accordion">

            <?php while (have_rows('accordion')) : the_row();

                $question = get_sub_field('question');
                $answer = get_sub_field('answer'); ?>

                <dt>
                    <span class="icon">
                        <i class="fas fa-caret-right"></i>
                    </span>
                    <a href=""><?php echo $question; ?></a>
                </dt>
                <dd><?php echo $answer; ?></dd>

            <?php endwhile; ?>
        
        </dl>

        <?php endif; ?>
    </div>

</section>

<?php get_footer(); ?>