<?php
/**
 * Template Name: Accordion
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Women_Owned_Wineries_Sonoma
 */

// $title

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section class="header section">
    <div class="container">
        <h2 class="title">
            <span class="icon">
                <i class="fas fa-question"></i>
            </span>
            <?php the_title(); ?>
        </h2>

        <div class="block">
            <img src="<?php echo $library_logo; ?>" alt="">
        </div>
    </div>
</section>
<section class="content section">
    <div class="container">
        
    <?php the_content(); ?>

        <?php
        // Check for accordion repeatter
        if( have_rows('accordion') ):

            // Loop through rows.
            while( have_rows('accordion') ) : the_row();

                // Load sub field value.
                $title = get_sub_field('title');
                $questions = get_sub_field('questions');
                if($title) : ?>
                    <h3><?php echo $title; ?></h3>
                <?php endif; ?>
        
        <ul class="accordion ">
            <?php
                    // Check rows exists.
                    if( have_rows('questions') ):

                        // Loop through rows.
                        while( have_rows('questions') ) : the_row();

                            // Load sub field value.
                            $question = get_sub_field('question');
                            $answer = get_sub_field('answer');
                            // Do something...?>
            <li>
                <input type="checkbox" checked="">
                <span class="carrot"></span>

                <h4><?php echo $question; ?></h4>
                <div class="content">
                    <?php echo $answer; ?>
                </div>
                <?php
                        // End loop.
                        endwhile;

                    // No value.
                    else :
                        // Do something...
                    endif; ?>
            </li>
        </ul>
        <?php
            // End loop.
            endwhile;

        // No value.
        else :
            // Do something...
        endif; ?>

    </div>
</section>
<section class="assessment-bar section">
    <div class="container">
        <h4>Take a short online assessment to see if Career Online High School is right for you.</h4>
        <div><a href="" class="button is-primary">Online Assessment</a></div>
    </div>
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>