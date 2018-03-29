<?php
/**
 * Tools for filtering blog posts
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div class="archiveTools">
	<div class="archiveTools__wrapper">
		<div class="archiveTools__categories archiveTool">
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
		<div class="archiveTools__tags archiveTool">
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
		<div class="archiveTools__author archiveTool">
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
</div>