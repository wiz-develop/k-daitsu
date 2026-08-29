<?php
/**
 * Plugin Name: WIZ Staging Guard
 * Description: Prevents indexing and accidental email delivery on staging.
 * Version: 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter(
	'wp_robots',
	function ( $robots ) {
		$robots['noindex']   = true;
		$robots['nofollow']  = true;
		$robots['noarchive'] = true;
		return $robots;
	}
);

add_action(
	'send_headers',
	function () {
		header( 'X-Robots-Tag: noindex, nofollow, noarchive', true );
	}
);

if ( ! defined( 'WIZ_STAGING_ALLOW_MAIL' ) || true !== WIZ_STAGING_ALLOW_MAIL ) {
	add_filter(
		'pre_wp_mail',
		function () {
			error_log( 'WIZ staging guard blocked an outbound WordPress email.' );
			return false;
		},
		PHP_INT_MAX
	);
}
