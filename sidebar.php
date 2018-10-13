<?php
/**
 * Theme Name: Zazil Lite
 * Author: Misho Studio
 * Author URI: http://mishostudio.com/
 *
 * @package zazil-lite
 */
if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
} ?>
<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
