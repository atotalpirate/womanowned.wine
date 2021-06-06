<?php

/**
 * Template Name: People
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Women_Owned_Wineries_Sonoma
 */

// $title

get_header(); 

$content = get_the_content();
$content_length = strlen($content); ?>



<section class="section people">
    <div class="container">
        <h1 class="title"><?php the_title(); ?></h1>

        <div class="content <?php ($content_length > 500) ? 'has-two-columns' : '' ; ?>">
            <?php echo the_content(); ?>
        </div>

        <div class="flourish-divider">
            <?php echo file_get_contents(get_stylesheet_directory() . '/img/flourish.svg'); ?>
        </div>

        <?php if (have_rows('people')) : ?>
            <div class="people columns is-variable is-8 is-multiline">
                <?php while (have_rows('people')) : the_row();
                    $name = get_sub_field('name');
                    $title = get_sub_field('title');
                    $profile = get_sub_field('profile');
                    $description = get_sub_field('description');
                    $counter++; ?>

                    <a id="modal_<?php echo $counter; ?>" class="person column is-one-third has-text-centered">
                        <figure class="image is-square">
                            <img class="is-rounded" src="<?php echo $profile;  ?>" alt="photo of <?php echo $name; ?>">
                        </figure>
                        <h5 class="title"><?php echo $name; ?></h5>
                        <p class="subtitle"><?php echo $title; ?></p>
                    </a>
                <?php endwhile; $counter = 0; ?>
            </div>
        <?php else : ?>
            <div class="empty">
                No people yet.
            </div>
        <?php endif; ?>

    </div>
</section>


<?php get_footer(); ?>

<?php while (have_rows('people')) : the_row();
                    $name = get_sub_field('name');
                    $title = get_sub_field('title');
                    $profile = get_sub_field('profile');
                    $description = get_sub_field('description');
                    $counter++; ?>
<div class="modal modal_<?php echo $counter; ?>">
    <div class="modal-background"></div>
    <div class="modal-content">
        <div class="card">
            <div class="card-image">
                <figure class="image">
                    <img src="<?php echo $profile; ?>" alt="Photo of <?php echo $name; ?>">
                </figure>
            </div>
            <div class="card-content">
                <div class="media">
                    <div class="media-content has-text-centered">
                        <p class="title is-3 has-text-dark"><?php echo $name; ?></p>
                        <p class="subtitle"><?php echo $title; ?></p>
                    </div>
                </div>

                <div class="content">
                    <?php echo $description; ?>
                </div>
            </div>
        </div>
    </div>
    <button class="modal-close is-large" aria-label="close"></button>
</div>
        <?php endwhile; ?>