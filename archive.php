<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

	<section class="section">
		<div class="container">
			<h1 class="title">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			</h1>
			<p class="subtitle">
				<?php if ( $description ) : ?>
					<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
				<?php endif; ?>
			</p>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<?php the_title(); the_content(); ?>
			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'template-parts/content/content-none' ); ?>
			<?php endif; ?>
		</div>	
	</section>

<?php get_footer(); ?>