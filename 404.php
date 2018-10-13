<?php
/**
 * Theme Name: Zazil Lite
 * Author: Misho Studio
 * Author URI: http://mishostudio.com/
 *
 * @package zazil-lite
 */
global $misho_opt;

get_header();

if ( !empty( $misho_opt ) ) {
    $page_title = $misho_opt[ 'page-title' ];
    $page_content = $misho_opt[ 'page-content' ];
    $page_enable_search = $misho_opt[ 'page-enable-search' ];
} else {
    $page_title = esc_html__( 'Oops! That page can&rsquo;t be found.', 'zazil-lite' );
    $page_content = esc_html__( 'It looks like nothing was found at this location.', 'zazil-lite' );
    $page_enable_search = true;
} ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <article class="error-404 not-found hentry">
                <div class="entry-wrapper-header">
                    <header class="entry-header">
                        <h2 class="entry-title"><?php echo $page_title; ?></h2>
                    </header><!-- .entry-header -->
                    <div class="entry-wrapper-content">
                        <div class="entry-content">
                            <p><?php echo $page_content; ?></p>
                        </div><!-- .entry-content -->
                        <?php
                        if ( $page_enable_search == true ) { ?>
                            <footer class="entry-footer">
                                <?php get_search_form(); ?>
                            </footer>
                            <?php
                        } ?>
                    </div>
            </article>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
