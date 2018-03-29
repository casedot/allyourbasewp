<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="main-container">
<div class="main-grid">
	<main class="main-content-full-width">
	<header id="content-header" class="headerGrid">
		<div class="pageTitle">
			<h1><?php the_archive_title();?></h1>
			<?php the_archive_description('<div class="subtitle taxonomy-description">', '</div>');?>
		</div>
		<?php //get_template_part( 'template-parts/archive-tools', 'none' ); ?>
	</header>
	<section id="main-posts">
		<div class="post-grid" data-equalizer data-equalize-by-row="true">
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; // End have_posts() check. ?>

			<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } ?>
		</div>
	</section>
	</main>
	<?php //get_sidebar(); ?>

</div>
</div>

<?php get_footer();
