<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Women_Owned_Wineries_Sonoma
 */

get_header();
// echo '<pre class="white text">';var_dump( $search_page );echo '</pre>';

$search_page = get_page_by_path('search');

$content = $search_page->post_content;
$content_length = strlen($content); ?>

<section class="directory header section">
	<div class="container">
		<h2 class="title">
			Directory
		</h2>

		<div class="content <?php ($content_length > 500) ? 'has-two-columns' : '' ; ?>">
			<?php echo $content; ?>
		</div>

		<?php get_search_form(); ?>

		<?php if (have_posts()) : ?>

			<div class="results">

				<div class="flourish-divider">
					<?php echo file_get_contents(get_stylesheet_directory() . '/img/flourish.svg'); ?>
				</div>


				<p class="has-text-centered">Results for: <?php echo $s; ?></p>

			<?php endif; ?>

			<?php if (have_posts()) :  ?>

				<div class="featured columns is-multiline">
					<?php while (have_posts()) : the_post(); ?>

						<?php
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
						$logo = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

						if ($featured) : ?>

							<div class="column is-one-third">

								<div class="card">
									<a href="<?php the_permalink(); ?>">
										<div class="card-image">
											<figure class="image is-4by3">
												<img class="" alt="image for <?php the_title(); ?>" title="<?php the_title(); ?>" src="<?php echo $logo; ?>">
											</figure>
										</div>
									</a>
									<div class="card-content">
										<a href="<?php the_permalink(); ?>" class="media">
											<div class="media-content">

												<?php if ($wben) : ?>
													<span class="icon verified is-medium">
														<span class="fa-stack fa-sm">
															<i class="fas fa-certificate fa-stack-2x has-text-info"></i>
															<i class="fas fa-check fa-stack-1x has-text-white"></i>
															<p class="has-text-info">WBENC</p>
														</span>
													</span>
												<?php endif; ?>

												<h3 class="title is-5"><?php the_title(); ?></h3>
												<?php echo ($proprietor) ? '<p class="subtitle is-5">' . $proprietor . '</p>' : ''; ?>
											</div>
										</a>

										<div class="content">
											<ul class="address">
												<?php
												if ($street && $city && $state) {
													echo '<li>';
													echo '<span class="icon"><i class="fas fa-map-marker-alt"></i></span>';
													echo ($street) ? '<span>' . $street . '</span><br>' : '';
													echo ($city) ? '<span>' . $city . '</span>' : '';
													echo ($state) ? '<span>' . $state['value'] . '</span>' : '';
													echo ($zip) ? '<span>' . $zip . '</span>' : '';
													echo '</li>';
												} elseif ($city && $state) {
														echo '<li>';
														echo '<span class="icon"><i class="fas fa-map-marker-alt"></i></span>';
														echo ($street) ? '<span>' . $street . '</span><br>' : '';
														echo ($city) ? '<span>' . $city . '</span>' : '';
														echo ($state) ? '<span>' . $state['value'] . '</span>' : '';
														echo ($zip) ? '<span>' . $zip . '</span>' : '';
														echo '</li>';
												}
												?>


											</ul>
										</div>
									</div>
									<footer class="card-footer">
										<?php echo ($phone) ? '<a class="card-footer-item" href="tel:' . sanitize_phone($phone) . '"><span class="icon"><i class="fas fa-phone"></i></span>' . sanitize_phone($phone) . '<a/>' : ''; ?>
										<?php echo ($website) ? '<a class="card-footer-item" href="' . $website . '" target=_blank><span class="icon"><i class="fas fa-globe"></i></span>Visit website</a>' : ''; ?>
									</footer>
								</div>

							</div>

						<?php endif; ?>

					<?php endwhile; ?>
				</div>


				<div class="not-featured columns is-variable is-8 is-multiline">
					<?php while (have_posts()) : the_post(); 
					
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
						$logo = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
						if (!$featured) : ?>

							<div class="column is-one-third">
								<header>
								<h3 class=""><?php the_title(); ?></h3>
								<?php echo ($proprietor) ? '<p class="subtitle is-5">' . $proprietor . '</p>' : ''; ?>
								</header>
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
									}
									?>
									<?php echo ($phone) ? '<li><a href="tel:' . sanitize_phone($phone) . '"><span class="icon"><i class="fas fa-phone"></i></span>' . sanitize_phone($phone) . '<a/></li>' : ''; ?>
									<?php echo ($website) ? '<li><a href="' . $website . '" target=_blank><span class="icon"><i class="fas fa-globe"></i></span>Visit website</a></li>' : ''; ?>
								</ul>
							</div>

						<?php endif; ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
			</div>

	</div>
</section>

<?php get_footer(); ?>

<div id="subscribeWall" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
        <form action="https://wowsonoma.us9.list-manage.com/subscribe/post-json?u=e49f49aef80cb79df223052d3&amp;id=f3ec14ba49" method="post" id="mc-modal-subscribe-form" name="mc-modal-subscribe-form" class="form validate" target="_blank" novalidate>
			<h3 class="title has-text-centered has-text-white">Join the Community!</h3>
			<p class="has-text-centered has-text-white">Like what you see? Subscribe to our newsletter.</p>
            <div class="field has-addons">
                <div class="control is-expanded has-icons-left">
                    <input type="email" value="" placeholder="hello@email.address" name="EMAIL" class="input is-rounded is-inverted required" id="mce-EMAIL" aria-required="true">
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_f1120753af05172754a874dee_ac3335af5e" tabindex="-1" value=""></div>
                </div>
                <div class="control">
                    <button type="submit" class="button is-rounded is-cta" id="mc-modal-subscribe">
                        <i class="fas fa-arrow-right"></i>
                    </button>
				</div>
            </div>

            <div id="mce-modal-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
			</div>
			
			<a id="optOut" href="#" class="opt-out has-text-centered has-text-white">
				No thanks! 
				<span class="icon">
					<i class="fas fa-smile-wink"></i>
				</span>
			</a>

            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_e49f49aef80cb79df223052d3_f3ec14ba49" tabindex="-1" value=""></div>
        </form>
    </div>
</div>