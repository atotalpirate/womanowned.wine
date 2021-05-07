<?php
/**
 * Template Name: Directory
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
