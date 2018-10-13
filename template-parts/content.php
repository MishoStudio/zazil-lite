<?php
/**
 * Theme Name: Zazil Lite
 * Author: Misho Studio
 * Author URI: http://mishostudio.com/
 *
 * @package zazil-lite
 */
global $misho_opt; ?>
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
            <div class="entry-meta">
                <?php zazil_lite_post_autor(); ?>
            </div><!-- .entry-meta -->
        </header><!-- .entry-header -->
        <div class="entry-date-wrapper">
            <?php zazil_lite_post_date(); ?>
        </div><!-- .entry-date -->
    </div>
    <div class="entry-wrapper-content">
        <div class="entry-content">
            <?php
            if ( is_single() ) {
                if (
                    $misho_opt[ 'social-sharing-facebook' ] == true ||
                    $misho_opt[ 'social-sharing-twitter' ] == true
                ) { ?>
                    <ul class="social-share">
                    <?php
                    if ( $misho_opt[ 'social-sharing-facebook' ] == true ) { ?>
                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                        <?php
                    }
                    if ( $misho_opt[ 'social-sharing-twitter' ] == true ) { ?>
                        <li><a href="https://twitter.com/home?status=<?php echo the_title_attribute() . esc_html_e( ' by ', 'zazil-lite' ) . get_the_author() . '. ' .  esc_url( get_permalink() ); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <?php
                    } ?>
                    </ul>
                <?php
                }
            }
            if ( ( is_home() || is_archive() ) && has_excerpt() ) {
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