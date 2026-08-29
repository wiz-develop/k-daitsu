<?php
/**
 * Load WordPress from the /cms directory while serving the site from the root.
 */

define( 'WP_USE_THEMES', true );
require __DIR__ . '/cms/wp-blog-header.php';
