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
		<main class="main-content">
		<header class="main-header">
			<div class="page-title">
				<h1 class="page-title bold"><?php the_archive_title();?></h1>
				<?php the_archive_description('<div class="subtitle taxonomy-description">', '</div>');?>
			</div>
			<div class="archive-tools">
				<div class="archive-tools-categories">
					<select onChange="document.location.href=this.options[this.selectedIndex].value;">
					<option>Categories</option>
					<?php 
						$cats = get_categories();
						foreach ( $cats as $cat ) {
							$cat_link = get_category_link( $cat->term_id );
							echo ('<option value="' . $cat_link . '">' . $cat->name . '</option>');
						} 
					?>
					</select>
				</div>
				<div class="archive-tools-tags">
					<select onChange="document.location.href=this.options[this.selectedIndex].value;">
					<option>Hashtags</option>
					<?php 
						$tags = get_tags();
						foreach ( $tags as $tag ) {
							$tag_link = get_tag_link( $tag->term_id );
							echo ('<option value="' . $tag_link . '">' . $tag->name . '</option>');
						} 
					?>
					</select>
				</div>
				<div class="archive-tools-author">
					<select onChange="document.location.href=this.options[this.selectedIndex].value;">
						<option>Authors</option>
						<?php
							// get WordPress authors					
							$authors = getAuthors();
							foreach ($authors as $author)
							{
								// get all the user's data
								$author_info = get_userdata($author->ID);
								echo('<option value="' . get_author_posts_url( $author_info->ID, $author_info->user_nicename ) . '">' . $author_info->first_name . ' ' . $author_info->last_name . '</option>');
							}
						?>		
					</select>		
				</div>
			</div>
		</header>
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
			<?php endwhile; ?>

			<?php else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; // End have_posts() check. ?>

			<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } ?>
		</main>
		<?php //get_sidebar(); ?>

	</div>
</div>

<?php get_footer();
