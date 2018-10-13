<?php
/**
 * Theme Name: Zazil Lite
 * Author: Misho Studio
 * Author URI: http://mishostudio.com/
 *
 * @package zazil-lite
 */
if ( has_post_thumbnail() ) { ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('content-masonry grid-item'); ?>>
        <div class="container">
            <?php zazil_lite_post_thumbnail_masonry(); ?>
            <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
            <a href="<?php the_permalink(); ?>" class="overlay"></a>
        </div>
    </div><!-- #post-<?php the_ID(); ?> -->
    <?php
} else { ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('content-masonry grid-item no-post-thumbnail'); ?>>
        <div class="container">
            <?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink( $post->ID ) ) . '" rel="bookmark">', '</a></h3>' ); ?>
        </div>
    </div><!-- #post-<?php the_ID(); ?> -->
    <?php
} ?>

