<?php
/**
 * Plugin Name: Equalize Digital oEmbed Cleaner
 * Description: Cleans invalid oEmbed caches when posts transition from scheduled to published
 * Version: 1.0.0
 * Author: Equalize Digital
 *
 * @package EqualizedigitalOembedCleaner
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Cleans up invalid oEmbed cache entries when a post transitions from scheduled to published
 *
 * @param string  $new_status New post status.
 * @param string  $old_status Old post status.
 * @param WP_Post $post       Post object.
 * @return void
 */
function eqd_clean_unknown_oembed_caches( $new_status, $old_status, $post ) {
	// Check if post is transitioning from future (scheduled) to publish.
	if ( 'publish' === $new_status && 'future' === $old_status ) {
		global $wpdb;
		
		// Use WordPress's table references.
		$wpdb->query( 
			$wpdb->prepare(
				"DELETE FROM {$wpdb->postmeta} 
				WHERE post_id = %d 
				AND meta_key LIKE '_oembed_%%' 
				AND meta_value = '{{unknown}}';",
				absint( $post->ID )
			)
		);
	}
}

// Hook into WordPress with a unique function name to avoid conflicts.
add_action( 'transition_post_status', 'eqd_clean_unknown_oembed_caches', 10, 3 );
