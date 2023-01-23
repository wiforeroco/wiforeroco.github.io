<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package VT_Framework
 */
?>
<div class="no-results not-found text-center">
	<div class="page-content">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'signy' ); ?></h1>
		<?php
			if ( is_search() ) : ?>
				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'signy' ); ?></p>
				<div class="widget_search">
					<div class="sgny-404-search-form">
						<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" class="searchform search-form" >
							<input class="search-field" type="search" name="s" id="s" placeholder="<?php esc_html_e('Enter Keyword', 'signy'); ?>">
							<button class="search-submit" id="searchsubmit" type="submit"><?php esc_html_e('Search', 'signy'); ?></button>
						</form>
					</div>
	            </div><?php
			else : ?>
			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'signy' ); ?></p>
				<div class="widget_search">
					<?php get_search_form(); ?>
				</div>
			<?php endif;
		?>
	</div>
</div>
