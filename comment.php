<?php
/**
 * Comment Template
 *
 * The comment template displays an individual comment. This can be overwritten by templates specific
 * to the comment type (comment.php, comment-{$comment_type}.php, comment-pingback.php, 
 * comment-trackback.php) in a child theme.
 *
 * @package dschool
 * @subpackage Template
 */

	global $post, $comment;
?>

	<li id="comment-<?php comment_ID(); ?>" class="<?php hybrid_comment_class(); ?>">

		<?php do_atomic( 'before_comment' ); // dschool_before_comment ?>

		<div class="comment-wrap">

			<?php do_atomic( 'open_comment' ); // dschool_open_comment ?>

			<?php echo hybrid_avatar(); ?>

			<?php echo apply_atomic_shortcode( 'comment_meta', "<div class='comment-meta'>[comment-author] [comment-published] [comment-permalink before=\"<span class='sep'>|</span> \"] [comment-edit-link before=\"<span class='sep'>|</span> \"] [comment-reply-link before=\"<span class='sep'>|</span> \"]</div>" ); ?>

			<div class="comment-content comment-text">
				<?php if ( '0' == $comment->comment_approved ) : ?>
					<?php echo apply_atomic_shortcode( 'comment_moderation', '<p class="alert moderation">' . __( 'Your comment is awaiting moderation.', hybrid_get_textdomain() ) . '</p>' ); ?>
				<?php endif; ?>

				<?php comment_text( $comment->comment_ID ); ?>
			</div><!-- .comment-content .comment-text -->

			<?php do_atomic( 'close_comment' ); // dschool_close_comment ?>

		</div><!-- .comment-wrap -->

		<?php do_atomic( 'after_comment' ); // dschool_after_comment ?>

	<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>