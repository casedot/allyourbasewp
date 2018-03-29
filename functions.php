<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Format comments */
require_once( 'library/class-foundationpress-comments.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/class-foundationpress-top-bar-walker.php' );
require_once( 'library/class-foundationpress-mobile-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/class-foundationpress-protocol-relative-theme-assets.php' );


// build list of authors
// used in template-parts/archive_tools.php
if (!function_exists("getAuthors")) { function getAuthors() {
    // WP_User_Query arguments
    $args = array (
        'role' => 'author',
        'order' => 'ASC',
        'orderby' => 'display_name',
    );

    // Create the WP_User_Query object
    $wp_user_query = new WP_User_Query($args);

    // Get the results
    $authorList = $wp_user_query->get_results();

    return $authorList;

    }
}


// hide the archive title prefix
// author: Ben Gillbanks
// https://www.binarymoon.co.uk/2017/02/hide-archive-title-prefix-wordpress/
function hap_hide_the_archive_title( $title ) {
    $title_parts = explode( ': ', $title, 2 );
    if ( ! empty( $title_parts[1] ) ) {
        $title = wp_kses(
            $title_parts[1],
            array(
                'span' => array(
                    'class' => array(),
                ),
            )
        );
        $title = '<span class="screen-reader-text">' . esc_html( $title_parts[0] ) . ': </span>' . $title;
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'hap_hide_the_archive_title' );