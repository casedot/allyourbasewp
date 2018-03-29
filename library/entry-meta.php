<?php
/**
 * Entry meta information for posts
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_entry_meta' ) ) :
	function foundationpress_entry_meta() {
		echo '<div class="postMeta__author"><p>' . __( 'by', 'foundationpress' ) . ' <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" rel="author" class="fn">' . get_the_author() . '</a> <time class="updated" datetime="' . get_the_time( 'c' ) . '">' . sprintf( __( 'on %1$s', 'foundationpress' ), get_the_date('M j, Y') ) . '</time></p></div>';
		/* translators: %1$s: current date, %2$s: current time */
		
		//echo '<div class="postMeta__time"><time class="updated" datetime="' . get_the_time( 'c' ) . '">' . sprintf( __( 'on %1$s', 'foundationpress' ), get_the_date('M j, Y') ) . '</time></div>';
		
		echo '<div class="postMeta__postLinks"><div class="postMeta__permalink"><p><a href="' . get_the_permalink() . '"><i class="fas fa-link"></i></a></p></div><div class="postMeta__comment"><p><a href="' . get_comments_link() . '"><i class="fas fa-comment"></i></a></p></div></div>';

		//echo '<div class="postMeta__comment"><a href="' . get_comments_link() . '">' . comments_number( '<i class="fas fa-comment"></i>', '1 <i class="fas fa-comment"></i>', get_comments_number().' <i class="fas fa-comment"></i>' ) . '</a></div>';
		
		if ( is_single() ) {
			echo '<div class="postMeta__share"><p><a href="#social-share">share <i class="fas fa-share"></i></a></p></div>';
		}
		// else {
		// 	echo '<div class="postMeta__share"><p><a href="' . get_the_permalink() .'#social-share">share <i class="fas fa-share"></i></a></p></div>';
		// }
	}
endif;
