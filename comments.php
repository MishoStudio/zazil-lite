<?php
/**
 * Theme Name: Zazil Lite
 * Author: Misho Studio
 * Author URI: http://mishostudio.com/
 *
 * @package zazil-lite
 *
 *
 *
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
} ?>
<div id="comments" class="comments-area">
	<?php
	if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html_e( 'One thought', 'zazil-lite' )
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought', '%1$s thoughts', $comment_count, 'comments title', 'zazil-lite' ) ),
					number_format_i18n( $comment_count )
				);
			}
			?>
		</h2><!-- .comments-title -->
		<?php
        the_comments_navigation(); ?>
		<ol class="comment-list">
			<?php
            wp_list_comments( array(
                'style'      => 'ol',
                'short_ping' => true,
            ) );
			?>
		</ol><!-- .comment-list -->
		<?php
        the_comments_navigation();

		if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'zazil-lite' ); ?></p>
		<?php
		endif;
	endif; // Check for have_comments().

	comment_form();
	?>
</div><!-- #comments -->
