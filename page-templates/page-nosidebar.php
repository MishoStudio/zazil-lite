<?php
/**
 * Theme Name: Zazil Lite
 * Author: Misho Studio
 * Author URI: http://mishostudio.com/
 * Template Name: No Sidebar Page
 *
 * @package zazil-lite
 */
get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php
            while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-wrapper-header">
                        <?php zazil_lite_post_thumbnail(); ?>
                        <header class="entry-header">
                            <?php
                        if ( is_singular() ) :
                            the_title( '<h1 class="entry-title">', '</h1>' );
                        else :
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        endif; ?>
                        </header><!-- .entry-header -->
                    </div>
                    <div class="entry-wrapper-content">
                        <div class="entry-content">
                            <?php
                            if ( is_archive() ) {
                                the_excerpt();
                            } else {
                                the_content( sprintf(
                                    wp_kses(
                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'zazil-lite' ),
                                        array(
                                            'span' => array(
                                                'class' => array(),
                                            ),
                                        )
                                    ),
                                    get_the_title()
                                ) );

                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'zazil-lite' ),
                                    'after'  => '</div>',
                                ) );
                            } ?>
                        </div><!-- .entry-content -->
                    </div>
                    <?php
                    if ( 'post' === get_post_type() ) : ?>
                        <footer class="entry-footer">
                            <div class="entry-comments-wrapper">
                                <?php zazil_lite_entry_comments(); ?>
                                <?php zazil_lite_entry_edit(); ?>
                            </div>
                            <?php zazil_lite_entry_meta(); ?>
                        </footer><!-- .entry-footer -->
                        <?php
                    endif; ?>
                </article><!-- #post-<?php the_ID(); ?> -->
                <?php
            endwhile; // End of the loop. ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();