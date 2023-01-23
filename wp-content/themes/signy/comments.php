<?php
/*
 * The template for displaying comments.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
if( comments_open() || have_comments() ) {
?>
<div class="sgny-container">
	<div class="sgny-comment-form-section">
		<div id="comments" class="sgny-comments-area comments-area">
			<div class="comments-section">
				<?php
				// You can start editing here -- including this comment!
				if ( have_comments() ) : ?>
					<h3 class="comments-title">
						<?php
							printf( // WPCS: XSS OK.
								esc_html__( _nx( 'Comment (%1$s)', 'Comments (%1$s)', get_comments_number(), 'comments title', 'signy' ) ),
								number_format_i18n( get_comments_number() ),
								'<span>' . get_the_title() . '</span>'
							);
						?>
					</h3>

					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
						<nav id="comment-nav-above" class="navigation vt-comment-navigation" role="navigation">
							<h2 class="vt-screen-reader-text"><?php esc_html_e( 'Comment navigation', 'signy' ); ?></h2>
							<div class="vt-nav-links">
								<div class="vt-nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'signy' ) ); ?></div>
								<div class="vt-nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'signy' ) ); ?></div>
							</div>
						</nav>
					<?php endif; // Check for comment navigation. ?>

					<ol class="comments">
						<?php wp_list_comments('type=all&callback=signy_comment_modification'); ?>
					</ol>

					<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
						<nav id="vt-comment-nav-below" class="navigation vt-comment-navigation" role="navigation">
							<h2 class="vt-screen-reader-text"><?php esc_html_e( 'Comment navigation', 'signy' ); ?></h2>
							<div class="vt-nav-links">
								<div class="vt-nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'signy' ) ); ?></div>
								<div class="vt-nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'signy' ) ); ?></div>
							</div>
						</nav>
					<?php
					endif; // Check for comment navigation.
				endif; // Check for have_comments().

				// If comments are closed and there are comments, let's leave a little note, shall we?
				if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
					<p class="vt-no-comments"><?php esc_html_e( 'Comments are closed.', 'signy' ); ?></p>
				<?php endif; ?>
			</div><!-- .comments-section -->
			<?php
			/* ==============================================
			  Comment Forms
			=============================================== */
			if ( comments_open() ) { ?>
				<div id="respond" class="sgny-comment-form comment-respond">
					<?php
						$post_comment_text = cs_get_option('post_comment_text');
						$post_comment_text = $post_comment_text ? $post_comment_text : esc_html__( 'Post Comment', 'signy' );
						$fields = array(
							'URL'    => '<div class="sgny-form-inputs no-padding-left"><div class="sgny-fix row input-group"><div class="col-sm-4"><input type="text" id="url" name="url" value="' . esc_attr(  $commenter['comment_author_url'] ) . '" tabindex="2" placeholder="' . esc_html__( 'Website', 'signy' ) . '"/></div>',
							'author' => '<div class="col-sm-4"><input type="text" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" tabindex="3" placeholder="' . esc_html__( 'Name', 'signy' ) . '"/></div>',
							'email'  => '<div class="col-sm-4"><input type="text" id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" tabindex="4" placeholder="' . esc_html__( 'Email', 'signy' ) . '"/></div></div></div>',
						);
						$defaults = array(
					      'comment_notes_before' => '',
					      'comment_notes_after'  => '',
					      'fields'  			 => apply_filters( 'comment_form_default_fields', $fields),
					      'id_form'              => 'commentform',
					      'id_submit'            => 'submit',
					      'title_reply'          => esc_html__( 'Leave Your Comments', 'signy' ),
					      'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'signy' ),
					      'cancel_reply_link'    => '<i class="fa fa-times-circle"></i>'. '',
					      'label_submit'         => $post_comment_text,
					      'comment_field' 		 => '<div class="sgny-form-textarea no-padding-right"><textarea id="comment" name="comment" tabindex="1" rows="3" cols="30" placeholder="' . esc_html__( 'Write your comment...', 'signy' ) . '" ></textarea></div>'
					    );
						comment_form($defaults);
					?>
				</div>
			<?php } ?>
		</div><!-- #comments -->
	</div>
</div>
<?php
}