<?php
/*
 * The template for displaying 404 pages (not found).
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
get_header(); ?>
<?php
	$error_page_content = cs_get_option('error_page_content');
	$error_btn_text = cs_get_option('error_btn_text');
	$error_btn_link = cs_get_option('error_btn_link');
?>

	<div class="sgny-center-container_area">
		<div class="sgny-container  sgny-main-content">
			<div class="text-center sgny-page-404-warp">
				<?php if ($error_page_content) { ?>
					<div class="sgny-404-text">
						<?php echo $error_page_content; ?>
					</div>
				<?php } else { ?>
					<div class="sgny-404-text">
						<h1><?php esc_html_e('404', 'signy'); ?></h1>
						<h2><?php esc_html_e('Oops! Page Not Found!', 'signy'); ?></h2>
						<p><?php esc_html_e('Sorry, but the page you were trying to view does not exist.', 'signy'); ?></p>
					</div>
        <?php } ?>

				<!--404 Search form start\-->
				<div class="sgny-404-search-form">
					<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>" class="searchform search-form" >
						<input class="search-field" type="search" name="s" id="s" placeholder="<?php esc_html_e('Enter Keyword', 'signy'); ?>">
						<button class="search-submit" id="searchsubmit" type="submit"><?php esc_html_e('Search', 'signy'); ?></button>
					</form>
				</div>
            <?php if ($error_btn_text) { ?>
            	<a class="sgny-404-homepage-link" href="<?php echo esc_url($error_btn_link); ?>"><?php echo esc_attr($error_btn_text); ?></a>
            <?php } else {?>
							<a class="sgny-404-homepage-link" href="<?php echo esc_url(get_home_url()); ?>"><?php esc_html_e('Go Back to Home', 'signy'); ?></a><!--/end-->
						<?php } ?>
			</div>
		</div>
	</div>
<?php
get_footer();
