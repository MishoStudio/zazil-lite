<?php
/**
 * Theme Name: Zazil Lite
 * Author: Misho Studio
 * Author URI: http://mishostudio.com/
 *
 * @package zazil-lite
 */ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-wrapper-header">
        <?php zazil_lite_post_thumbnail(); ?>
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->
    </div>
    <div class="entry-wrapper-content">
        <div class="entry-content">
            <?php
            the_content();

            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zazil-lite' ),
                'after'  => '</div>',
            ) );
            ?>
        </div><!-- .entry-content -->
    </div>
    <?php
    if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Edit <span class="screen-reader-text">%s</span>', 'zazil-lite' ),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<div class="entry-comments-wrapper"><span class="edit-link">',
                '</span></div>'
            ); ?>
        </footer><!-- .entry-footer -->
        <?php
    endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
