<?php
/**
 * Theme Name: Zazil Lite
 * Author: Misho Studio
 * Author URI: http://mishostudio.com/
 *
 * @package zazil-lite
 */ ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main content-none">
        <article class="hentry">
            <div class="entry-wrapper-header">
                <header class="entry-header">
                    <h2 class="entry-title"><?php esc_html_e( 'Nothing Found', 'zazil-lite' ); ?></h2>
                </header><!-- .entry-header -->
                <div class="entry-wrapper-content">
                    <div class="entry-content">
                        <?php
                        if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
                            <p><?php
                                printf(
                                    wp_kses(
                                    /* translators: 1: link to WP admin new post page. */
                                        __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'zazil-lite' ),
                                        array(
                                            'a' => array(
                                                'href' => array(),
                                            ),
                                        )
                                    ),
                                    esc_url( admin_url( 'post-new.php' ) )
                                );
                                ?></p>
                                <?php
                        elseif ( is_search() ) : ?>
                            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'zazil-lite' ); ?></p>
                            <footer class="entry-footer">
                                <?php get_search_form(); ?>
                            </footer>
                            <?php
                        else : ?>
                            <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'zazil-lite' ); ?></p>
                            <footer class="entry-footer">
                                <?php get_search_form(); ?>
                            </footer>
                            <?php
                        endif; ?>
                    </div><!-- .entry-content -->
                </div>
        </article>
    </main><!-- #main -->
</div><!-- #primary -->