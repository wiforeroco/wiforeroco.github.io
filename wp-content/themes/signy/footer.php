<?php
/*
 * The template for displaying the footer.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */
if (is_active_sidebar('footer')) {
	$footer_widget_active = 'footer-widget-active';
} else {
	$footer_widget_active = 'footer-widget-not-active';
}
?>
<!-- footer area start\-->
<footer class="sgny-center-container_area sgny-footer-area <?php echo esc_attr($footer_widget_active); ?>">
	<div class="text-center sgny-container">
		<?php if (is_active_sidebar('footer')) { ?>
		<div class="sgny-footer-widget-warp">
			<div class="sgny-footer-widget  widget_text">
				<div class="textwidget">
					<?php
						$footer_widget_block = cs_get_option('footer_widget_block');
						if (isset($footer_widget_block)) {
							get_template_part( 'layouts/footer/footer', 'widgets' );
				    }
					?>
				</div>
			</div>
		</div>
		
		<?php } ?>
		<!--Footer copyright start/-->

		<?php
		$need_copyright = cs_get_option('need_copyright');
		if (isset($need_copyright)) {
			$copyright_text = cs_get_option('copyright_text');
			if ($copyright_text) {
		?>
			<p class="sgny-copyright">
				<?php echo do_shortcode($copyright_text); ?>
		  </p>
		<?php } else {
			echo '<p class="sgny-copyright">&copy; '. date('Y') .' All rights reserved.</p>';
		} } ?>

	</div>
</footer>
</div>
<?php get_sidebar(); ?>
</div>
</div>
<!--/===XXXXXXXXXXX MAIN LAYOUT END XXXXXXXXXXX====-->
<?php wp_footer(); ?>
</body>
</html>
