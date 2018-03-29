<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
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
			<h1><?php single_post_title();?></h1>
			<?php the_archive_description('<div class="subtitle taxonomy-description">', '</div>');?>
		</div>
		<?php get_template_part( 'template-parts/archive-tools', 'none' ); ?>
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
