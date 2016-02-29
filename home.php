<?php
/**
 * Post loop, used for updates
 *
 * @since 1.0.0
 */

add_filter( 'genesis_post_info', function() { return '[post_date]'; } );

genesis();