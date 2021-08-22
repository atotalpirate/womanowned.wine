<?php

/**
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Women_Owned_Wineries_Sonoma
 */

get_header();
$title = get_the_title();
$description = get_the_content();
$image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
$featured_bottles = get_field('featured_bottles');
?>

<section class="club section">
	<div class="container">
		<div class="columns">
			<div class="column is-half">
				<img src="<?php echo $image; ?>" alt="">
				<h1 class="title "><?php echo $title; ?></h1>
				<div class="content">
					<?php echo $description; ?>
				</div>
				<?php if ($featured_bottles) : ?>
					<div class="featured-bottles">
						<span>
							<h3 class="featured-title">Featuring</h3>
						</span>
						<div class="columns is-mobile">
							<?php
								foreach ($featured_bottles as $key => $bottle) :
									$bottle_img = wp_get_attachment_url(get_post_thumbnail_id($bottle->ID));
									$bottle_title = get_the_title( $bottle->ID );
									$bottle_term = wp_get_post_terms($bottle->ID, 'varietals');
									$bottle_url = get_the_permalink($bottle->ID); ?>
							<div class="column is-one-third">
								<figure class="image">
									<img class="is-round" src="<?php echo $bottle_img; ?>">
								</figure>
								<h3><?php echo $bottle_title; ?></h3>
								<h4><?php echo $bottle_term[0]->name; ?></h4>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div class="vinespring column is-half" data-vinespring="club-signup">
			</div>
		</div>

	</div>
</section>

<?php
get_footer();
