<?php
/*
 * All WooCommerce Related Functions
 * Author & Copyright: WPTC
 * URL: http://victorthemes.com
 */

if ( class_exists( 'WooCommerce' ) ) {

	// Remove Shop Page title
	add_filter( 'woocommerce_show_page_title' , 'sgny_woocommerce_hide_page_title' );
	function sgny_woocommerce_hide_page_title() {
		return false;
	}

	// Single Product Single/Gallery Script
	add_action( 'after_setup_theme', 'signy_single_product_gallery_image' );
	function signy_single_product_gallery_image() {
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
	}

	// Replace WooCommerce Default Pagination with Signy Pagination.
	remove_action('woocommerce_pagination', 'woocommerce_pagination', 10);
	function woocommerce_pagination() {
	    signy_paging_nav();
	}
	add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10);

	// Add menu woocommerce
	add_action( 'after_setup_theme', 'signy_woocommerce_support' );
	function signy_woocommerce_support() {
		add_theme_support( 'woocommerce' );
	}

	// remove warp product link
	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

	// warp product details warp with div sgny-product-text-warp and sgny-product-link-wishlist class
	add_action( 'woocommerce_after_shop_loop_item_title', function(){
		echo "</a><div class='sgny-product-text-warp'><div class='sgny-product-link-wishlist'>";
	});

	add_action('woocommerce_before_shop_loop_item',function(){
	echo'<a class="woocommerce-LoopProduct-link" href="'.get_permalink().'">';
	});

	// warp product price and add to cart with	sgny-product-price-add-cart class div
	add_action( 'woocommerce_after_shop_loop_item_title', function(){
		echo "</div><div class='sgny-product-price-add-cart'>";
	},25);

	// warp with end div
	add_action("woocommerce_after_shop_loop_item",function(){
		echo "</div></div>";
	});

	// remove rating in product page
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

	// move product title page
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title',10);
	add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_product_title',20);

	// product title linked
	if (  ! function_exists( 'woocommerce_template_loop_product_title' ) ) {

		/**
		 * Show the product title in the product loop. By default this is an H3.
		 */
		function woocommerce_template_loop_product_title() {
			echo '<a class="woocommerce-LoopProduct-link" href="'.get_permalink().'"><h3>'. get_the_title() .'</h3></a>';
		}
	}

	// move product price
	remove_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10 );
	add_action( 'woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',25 );

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	// check for plugin using plugin name
	if (is_plugin_active( 'yith-woocommerce-wishlist/init.php' ) ) {
		// add product wishlist button
		add_action( 'woocommerce_after_shop_loop_item_title', function(){
			echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
		},20);
		// add product wishlist button change text
		add_filter("yith_wcwl_button_label",function($icon){
			return "<i class='fa fa-heart-o'></i>";
		});

		// add product wishlist browse button change text
		add_filter("yith-wcwl-browse-wishlist-label",function($icon){
			return "<i class='fa fa-heart'></i>";
		});

	}

	// single page related product post query customize
	add_filter("woocommerce_output_related_products_args",function($args){
		$args = array(
			'posts_per_page' =>-1,
			'columns' =>3,
			'orderby' =>'rand',
		);
	   return $args;
	});

	// Display Custom filed in product page
	add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );

	// Save Custom filed
	add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

	function woo_add_custom_general_fields() {

	  global $woocommerce, $post;
		woocommerce_wp_checkbox(
		array(
			'id'            => '_checkbox',
			'wrapper_class' => 'hover_image',
			'label'         => esc_html__('Disable', 'signy' ),
			'description'   => esc_html__( 'Disable Image hover in shop page', 'signy' )
			)
		);
	}

	function woo_add_custom_general_fields_save( $post_id ){
		$woocommerce_checkbox = isset( $_POST['_checkbox'] ) ? 'yes' : 'no';
		update_post_meta( $post_id, '_checkbox', $woocommerce_checkbox );
	}

	// WooCommerce Products per Page Limit
	add_filter( 'loop_shop_per_page', 'signy_product_limit', 20 );
	if ( ! function_exists('signy_product_limit') ) {
		function signy_product_limit() {
			$woo_limit = cs_get_option('theme_woo_limit');
			$woo_limit = $woo_limit ? $woo_limit : '9';
			return $woo_limit;
		}
	}

	// Image Flipper class
	if ( ! class_exists( 'WC_sgny' ) ) {

		class WC_sgny {
			public function __construct() {
				add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'woocommerce_template_loop_second_product_thumbnail' ), 11 );
				add_filter( 'post_class', array( $this, 'product_has_gallery' ) );
			}

			// Add sgny-has-gallery class to products that have a gallery
			function product_has_gallery( $classes ) {
				global $product;

				$post_type = get_post_type( get_the_ID() );

				if ( ! is_admin() ) {
					if ( $post_type == 'product' ) {
						$attachment_ids = $this->get_gallery_image_ids( $product );
						if ( $attachment_ids ) {
							$classes[] = 'sgny-has-gallery';
						}
					}
				}
				return $classes;
			}
			// Display the second thumbnails
			function woocommerce_template_loop_second_product_thumbnail() {
				global $product, $woocommerce;

				$attachment_ids = $this->get_gallery_image_ids( $product );
				$hoverimg = get_post_meta(get_the_ID(), '_checkbox', true );
				if($hoverimg == 'no'){
					if ( $attachment_ids ) {
						$attachment_ids     = array_values( $attachment_ids );
						$secondary_image_id = $attachment_ids['0'];

						echo "<div class='sgny-product-2nd-image'>";

						echo wp_get_attachment_image( $secondary_image_id, 'shop_catalog', '', $attr = array( 'class' => 'secondary-image attachment-shop-catalog wp-post-image' ) );
						echo "</div>";
					}
				}
			}
			// Get product gallery image IDs
			function get_gallery_image_ids( $product ) {
				if ( ! is_a( $product, 'WC_Product' ) ) {
					return;
				}

				if ( is_callable( 'WC_Product::get_gallery_image_ids' ) ) {
					return $product->get_gallery_image_ids();
				} else {
					return $product->get_gallery_attachment_ids();
				}
			}
		}
		$WC_sgny = new WC_sgny();
	}

	// Define image sizes
	 add_theme_support( 'woocommerce', array(
	  'thumbnail_image_width' => 264,
	  'single_image_width' => 370,
	  ) );
	 
	 update_option( 'woocommerce_thumbnail_cropping', 'custom' );
	 update_option( 'woocommerce_thumbnail_cropping_custom_width', '3' );
	 update_option( 'woocommerce_thumbnail_cropping_custom_height', '5' );

} // class_exists => WooCommerce