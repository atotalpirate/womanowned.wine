<?php
/**
 * Template Name: Directory
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Women_Owned_Wineries_Sonoma
 */


$search_page = get_page_by_path('search');

// echo '<pre class="white text">';var_dump( $search );echo '</pre>';

get_header();
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

	</div>
</section>

<?php get_footer();
