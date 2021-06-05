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
				<div class="card">
					<div class="card-bg" style="background-image: url(<?php echo $image; ?>);"></div>
					<div class="card-content has-text-white">
						<h1 class="title "><?php echo $title; ?></h1>
					</div>
				</div>
				<div class="content">
					<?php echo $description; ?>
				</div>
				<?php if ($featured_bottles) : ?>
					<h4 class="title is-size-4">Learn more about the wines!</h4>
					<div class="featured-bottles columns">
						<?php
							foreach ($featured_bottles as $key => $bottle) :
								$bottle_img = wp_get_attachment_url(get_post_thumbnail_id($bottle->ID));
								$bottle_title = get_the_title( $bottle->ID );
								$bottle_term = wp_get_post_terms($bottle->ID, 'varietals');
								$bottle_url = get_the_permalink($bottle->ID);
						//  echo '<pre class="white text">';var_dump($bottle_img);echo '</pre>'; ?>
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
			<div class="vinespring column is-half" data-vinespring="club-signup">
			</div>
		</div>

	</div>
</section>

<?php
get_footer();
