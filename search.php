<?php
/**
 * Theme Name: Zazil Lite
 * Author: Misho Studio
 * Author URI: http://mishostudio.com/
 *
 * @package zazil-lite
 */
get_header(); ?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php
		if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php
					printf( esc_html__( 'Search Results for: %s', 'zazil-lite' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
			</header><!-- .page-header -->
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <?php
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content-search', 'search' );
                    endwhile;
                    the_posts_navigation();
                    else :
                        get_template_part( 'template-parts/content-none', 'none' );
                    endif; ?>
                </main><!-- #main -->
            </div><!-- #primary -->
		</main><!-- #main -->
	</section><!-- #primary -->
<?php
get_footer();
