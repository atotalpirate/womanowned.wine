<?php
/**
 * Template Name: Directory
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Women_Owned_Wineries_Sonoma
 */


$search_page = get_page_by_title('search');

// echo '<pre class="white text">';var_dump( $search );echo '</pre>';

get_header();
?>

<section class="directory header section">
	<div class="container">
		<h2 class="title">
			Directory
		</h2>

		<div class="content">
			<?php echo $search_page->post_content; ?>
		</div>

		<?php get_search_form(); ?>

	</div>
</section>

<?php get_footer();
