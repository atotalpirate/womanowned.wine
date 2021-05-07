<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Women_Owned_Wineries_Sonoma
 */

// echo '<pre class="white text">';var_dump( $search );echo '</pre>';

get_header();
?>

<section class="directory header section">
	<div class="container">
		<h2 class="title">
			Directory
		</h2>

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
						// echo '<pre class="white text">';var_dump( $address['state'] );echo '</pre>';
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
												<img class="" src="<?php echo $logo; ?>">
											</figure>
										</div>
									</a>
									<div class="card-content">
										<a href="<?php the_permalink(); ?>" class="media">
											<div class="media-left">
												<!-- <figure class="image is-48x48">
											<img src="https://bulma.io/images/placeholders/96x96.png" class="is-rounded" alt="Placeholder image">
										</figure> -->
											</div>
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
												<?php echo ($proprietor) ? '<p class="subtitle is-6">' . $proprietor . '</p>' : ''; ?>
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
					
						// echo '<pre class="white text">';var_dump( $address['state'] );echo '</pre>';
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
								<?php echo ($proprietor) ? '<p class="subtitle is-6">' . $proprietor . '</p>' : ''; ?>
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

<div class="modal">
	<div class="modal-background"></div>
	<div class="modal-content">
		<p class="image is-2by3">
			<img src="https://bulma.io/images/placeholders/1280x960.png" alt="">
		</p>
		<div class="content">
			<h3>Get in touch!</h3>
			<p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. </p>
			<div class="field">
				<label class="label">Name</label>
				<div class="control">
					<input class="input" type="text" placeholder="Text input">
				</div>
			</div>

			<div class="field">
				<label class="label">Username</label>
				<div class="control has-icons-left has-icons-right">
					<input class="input is-success" type="text" placeholder="Text input" value="bulma">
					<span class="icon is-small is-left">
						<i class="fas fa-user"></i>
					</span>
					<span class="icon is-small is-right">
						<i class="fas fa-check"></i>
					</span>
				</div>
				<p class="help is-success">This username is available</p>
			</div>

			<div class="field">
				<label class="label">Email</label>
				<div class="control has-icons-left has-icons-right">
					<input class="input is-danger" type="email" placeholder="Email input" value="hello@">
					<span class="icon is-small is-left">
						<i class="fas fa-envelope"></i>
					</span>
					<span class="icon is-small is-right">
						<i class="fas fa-exclamation-triangle"></i>
					</span>
				</div>
				<p class="help is-danger">This email is invalid</p>
			</div>

			<div class="field">
				<label class="label">Subject</label>
				<div class="control">
					<div class="select">
						<select>
							<option>Select dropdown</option>
							<option>With options</option>
						</select>
					</div>
				</div>
			</div>

			<div class="field">
				<label class="label">Message</label>
				<div class="control">
					<textarea class="textarea" placeholder="Textarea"></textarea>
				</div>
			</div>

			<div class="field">
				<div class="control">
					<label class="checkbox">
						<input type="checkbox">
						I agree to the <a href="#">terms and conditions</a>
					</label>
				</div>
			</div>

			<div class="field">
				<div class="control">
					<label class="radio">
						<input type="radio" name="question">
						Yes
					</label>
					<label class="radio">
						<input type="radio" name="question">
						No
					</label>
				</div>
			</div>

			<div class="field is-grouped">
				<div class="control">
					<button class="button is-link">Submit</button>
				</div>
				<div class="control">
					<button class="button is-link is-light">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<button class="modal-close is-large" aria-label="close"></button>
</div>

<?php get_footer();
