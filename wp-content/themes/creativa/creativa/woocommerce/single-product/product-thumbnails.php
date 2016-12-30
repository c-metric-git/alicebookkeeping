<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();

if ( $attachment_ids ) {
	$loop 		= 0;
	$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	?>
	<div class="thumbnails <?php echo 'columns-' . $columns; ?>"><?php

		foreach ( $attachment_ids as $attachment_id ) {

			$classes = array( 'zoom' );

			if ( $loop === 0 || $loop % $columns === 0 ) {
				$classes[] = 'first';
			}

			if ( ( $loop + 1 ) % $columns === 0 ) {
				$classes[] = 'last';
			}

			$image_class = implode( ' ', $classes );
			$props       = wc_get_product_attachment_props( $attachment_id, $post );

			if ( ! $props['url'] ) {
				continue;
			}

			$placeholder_sizes = wc_get_image_size( 'shop_thumbnail' );
			$image_url_thumb_id = get_post_thumbnail_id();
			$image_src = wp_get_attachment_image_src($attachment_id, 'full');
			
			if ($image_src[1] >= $placeholder_sizes['width'] && $image_src[2] >= $placeholder_sizes['height']) {
				$image_thumb = aq_resize( $image_src[0], $placeholder_sizes['width'], $placeholder_sizes['height'], $placeholder_sizes['crop'], false );
			} else {
				$image_thumb = $image_src;
			}

			$aq_image = '<img class="attachment-shop_single creativa_product_thumb_small" src="'. esc_url($image_thumb[0]) .'" width="'. esc_attr($image_thumb[1]) .'" height="'. esc_attr($image_thumb[2]) .'"  alt="'. esc_attr($props['alt']) .'" title='. esc_attr($props['title']) .' />';

			echo apply_filters(
				'woocommerce_single_product_image_thumbnail_html',
				sprintf(
					'<a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a>',
					esc_url( $props['url'] ),
					esc_attr( $image_class ),
					esc_attr( $props['caption'] ),
					$aq_image
				),
				$attachment_id,
				$post->ID,
				esc_attr( $image_class )
			);

			$loop++;
		}

	?></div>
	<?php
}
