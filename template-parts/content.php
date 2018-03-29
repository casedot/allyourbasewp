<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post__content">
		<header>
		<?php if ( is_single() ) {	?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php } else { ?>
			<h2 class="entry-title"><a href="<?php the_permalink() ?>"><img data-interchange="[<?php the_post_thumbnail_url('featured-small'); ?>, small], [<?php the_post_thumbnail_url('featured-medium'); ?>, large]"><span><?php the_title(); ?></span></a></h2>
		<?php } ?>
		</header>
		<?php if ( is_single() ) { ?>
			<div class="entry-content">
				<?php the_content(); ?>
				<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
		<?php } else { ?>
			<?php if (has_excerpt()) { ?><div class="entry-subtitle"><?php the_excerpt(); ?></div><?php } ?>
		<?php } ?>
		<footer>
			<div class="post__footer">
				<?php
					// wp_link_pages(
					// 	array(
					// 		'before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ),
					// 		'after'  => '</p></nav>',
					// 	)
					// );
				?>
				<div class="postMeta__byline">
					<?php foundationpress_entry_meta(); ?>
				</div>
				<!-- <div class="postMeta__tags">
					<?php $tag = get_the_tags(); if ( $tag ) { ?><?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?><?php } ?>
				</div> -->
			</div>
		</footer>
	</div>
</article>