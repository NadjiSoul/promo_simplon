<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package crater-free
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

 function crater_free_comment_callback( $comment, $args, $depth ) {
	 $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
?>
	<<?php echo esc_attr($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
	    	        <?php
	    				comment_reply_link( array_merge( $args, array(
	    					'add_below' => 'comment',
	    					'depth'     => $depth,
	    					'max_depth' => $args['max_depth'],
	    					'before'    => '<div class="reply">',
	    					'after'     => '</div>'
	    				) ) );
	    			?>
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<?php printf( '%s <span class="says">'. __( "says:",'crater-free' ).'</span>', sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment ) ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php
								/* translators: 1: comment date, 2: comment time */
								printf( __( '%1$s at %2$s','crater-free'), get_comment_date( '', $comment ), get_comment_time() );
							?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit','crater-free' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.','crater-free' ); ?></p>
				<?php endif; ?>

			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

		</article><!-- .comment-body -->
	<?php
 }


if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( '%1$s people reacted on this', '%1$s People reacted on this', get_comments_number(), 'comments title', 'crater-free' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'crater-free' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'crater-free' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'crater-free' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style' => 'ol',
					'short_ping' => true,
					'avatar_size' => 50,
					'callback' => 'crater_free_comment_callback'
				) );

			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'crater-free' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'crater-free' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'crater-free' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php _e( 'Comments are closed.', 'crater-free' ); ?></p>
	<?php
	endif;

	$defaults = array(
	                'comment_field' => '<p class="comment-form-comment"><label for="comment" class="screen-reader-text">' . esc_html__( 'Comment', 'crater-free' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
	                'comment_notes_before' => null,
	                'comment_notes_after'  => null,
	                'id_form'              => 'commentform',
              		'id_submit'            => 'submit',
           			'title_reply'          => apply_filters( 'crater_free_leave_comment', __( 'Leave a Comment', 'crater-free' ) ),
                	'label_submit'         => apply_filters( 'crater_free_post_comment', __( 'Post Comment', 'crater-free' ) ),
	        );
	comment_form( $defaults );
	
	?>

</div><!-- #comments -->
