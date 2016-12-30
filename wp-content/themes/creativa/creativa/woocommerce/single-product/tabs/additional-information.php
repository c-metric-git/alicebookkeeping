<?php
/**
 * Additional Information tab
 * 
 * @author        WooThemes
 * @package       WooCommerce/Templates
 * @version       2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	// Exit if accessed directly
	exit;
}

global $product, $post;

// $single_product_clean = $creativa_options['opt-single-clean-product'];

if (is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'vc_row')) { ?>
	<div class="section"><div class="container"><div class="row"><div class="col-md-12">
<?php }

$heading = apply_filters( 'woocommerce_product_additional_information_heading', esc_html__( 'Additional Information', 'woocommerce' ) );
?>

<?php $product->list_attributes(); ?>

<?php 
if (is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'vc_row')) { ?>
	</div></div></div></div>
<?php } ?>