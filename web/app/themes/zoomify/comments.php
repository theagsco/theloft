<?php
/**
 * The template for displaying Comments.
 *
 * @package Zoomify
 */
?>

	<div id="comments" class="comments-area">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'zoomify' ); ?></p>
	</div><!-- #comments .comments-area -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				printf( _n( '1 Comment so far', '%1$s Comments', get_comments_number(), 'zoomify' ),
					number_format_i18n( get_comments_number() ) );
			?>
		</h3>

		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use zoomify_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define zoomify_comment() and that will be used instead.
				 * See zoomify_comment() in functions.php for more.
				 */
				wp_list_comments( array( 'callback' => 'zoomify_comment' ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="nav-comments">
			<div class="nav-previous"><?php previous_comments_link( __( '<span>&larr; Older</span>', 'zoomify' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( '<span>Newer &rarr;</span>', 'zoomify' ) ); ?></div>
		</nav><!-- end #comment-nav -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are no comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'zoomify' ); ?></p>
	<?php endif; ?>

  <?php $comments_args = array(
      // change the title of send button
      'label_submit' => __( 'Post Comment', 'zoomify' ),
      // change the title of the reply section
      'title_reply'=> __( '<h3 id="reply-title">Leave a Reply</h3>', 'zoomify'),
      // remove "Text or HTML to be displayed after the set of comment fields"
      'comment_notes_after' => '',
      // redefine your own textarea (the comment body)
      'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Write your message here... <span class="required">*</span>', 'noun', 'zoomify' ) . 			'</label><br/><textarea id="comment" name="comment" rows="8"></textarea></p>',
    ); ?>

	<?php comment_form($comments_args); ?>

	</div><!-- #comments .comments-area -->
