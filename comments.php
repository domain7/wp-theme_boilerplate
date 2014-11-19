<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>

	<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

	<ol id="commentlist">
	<?php wp_list_comments('avatar_size=45'); ?>
	</ol>
	
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h3 class="screen-reader-text"><?php _e( 'Comment navigation', 'lps_basic' ); ?></h3>
			<div class="nav-previous"><?php previous_comments_link( __( '&laquo; Older Comments', 'lps_basic' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &raquo;', 'lps_basic' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<?php comment_form(); ?>

<?php endif; // if you delete this the sky will fall on your head ?>