<?php
$brand_logo_default = cs_get_option('brand_logo_default');
$brand_logo_retina = cs_get_option('brand_logo_retina');

// Retina Size
$retina_width = cs_get_option('retina_width');
$retina_height = cs_get_option('retina_height');
if($retina_width){
	$retina_width = 'width="'.esc_attr($retina_width).'"';
} else {
	$retina_width = '';
}
if($retina_height){
	$retina_height = 'height="'.esc_attr($retina_height).'"';
} else {
	$retina_height = '';
}

// Logo Spacings
$brand_logo_top = cs_get_option('brand_logo_top');
$brand_logo_bottom = cs_get_option('brand_logo_bottom');

if ($brand_logo_top !== '') {
	$brand_logo_top = 'padding-top:'. signy_check_px($brand_logo_top) .';';
} else { $brand_logo_top = ''; }
if ($brand_logo_bottom !== '') {
	$brand_logo_bottom = 'padding-bottom:'. signy_check_px($brand_logo_bottom) .';';
} else { $brand_logo_bottom = ''; }
?>

<div class="sgny-logo" style="<?php echo esc_attr($brand_logo_top); echo esc_attr($brand_logo_bottom); ?>" ><a href="<?php echo get_home_url(); ?>">
	<?php
		if (isset($brand_logo_default)){
			if(isset($brand_logo_retina)){
		  	echo'<img src="'.wp_get_attachment_url($brand_logo_retina).'" '. $retina_width .' '. $retina_height .' alt="'.get_bloginfo( 'name' ).'" class="retina-logo">';
		  }
	  	echo'<img src="'.wp_get_attachment_url($brand_logo_default).'" '. $retina_width .' '. $retina_height .' alt="'.get_bloginfo( 'name' ).'" class="default-logo">';
		} else {
		  echo'<div><h2>'. get_bloginfo( 'name' ) .'</h2></div>';
		}
	?>
	</a>
</div>
