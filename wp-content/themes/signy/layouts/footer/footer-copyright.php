<?php
	// Main Text
	$signy_need_copyright = cs_get_option('need_copyright');
	$signy_footer_copyright_layout = cs_get_option('footer_copyright_layout');

	if ($signy_footer_copyright_layout === 'copyright-1') {
		$signy_copyright_layout_class = 'col-sm-6';
		$signy_copyright_seclayout_class = 'text-right';
	} elseif ($signy_footer_copyright_layout === 'copyright-2') {
		$signy_copyright_layout_class = 'col-sm-6 pull-right text-right';
		$signy_copyright_seclayout_class = 'text-left';
	} elseif ($signy_footer_copyright_layout === 'copyright-3') {
		$signy_copyright_layout_class = 'col-sm-12 text-center';
	} else {
		$signy_copyright_layout_class = '';
		$signy_copyright_seclayout_class = '';
	}

	if (isset($signy_need_copyright)) {
?>

<!-- Copyright Bar -->
<div class="container-fluid">
	<div class="row">

		<div class="sgny-copyright">
		<div class="container">
		<div class="row">

			<div class="cprt-left <?php echo esc_attr($signy_copyright_layout_class); ?>">
				<?php
					$signy_copyright_text = cs_get_option('copyright_text');
					echo '<p>'. do_shortcode($signy_copyright_text) .'</p>';
				?>
			</div>
			<?php if ($signy_footer_copyright_layout != 'copyright-3') { ?>
			<div class="col-sm-6 cprt-right <?php echo esc_attr($signy_copyright_seclayout_class); ?>">
				<?php
					$signy_secondary_text = cs_get_option('secondary_text');
					echo do_shortcode($signy_secondary_text);
				?>
			</div>
			<?php } ?>

		</div>
		</div>
		</div>

	</div>
</div>
<!-- Copyright Bar -->
<?php }