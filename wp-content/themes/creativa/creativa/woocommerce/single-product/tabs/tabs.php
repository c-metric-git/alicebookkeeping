<?php
/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;
/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

<div class="woo__creativa--tabs-wrapper">
	<div class="container">
  		<div class="row">
    		<div class="col-md-12">


				<div class="woocommerce-tabs">
					<ul class="nav nav-tabs">
						<?php 
							$isFirst = true;
							foreach ( $tabs as $key => $tab ) : ?>

							<li class="<?php echo $key ?>_tab <?php echo $isFirst ? ' active' : '' ?>">
								<a data-toggle="tab" href="#tab-<?php echo $key ?>" class="ui-tabs-anchor"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></a>
							</li>

						<?php $isFirst = false; endforeach; ?>
					</ul>
				</div>



			</div>
		</div>
	</div>
</div>

<?php 

	$section_class = 'section';

	if (is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'vc_row')) {
		$section_class = '';
	}
?>

<div class="content-separated woo__creativa--description__content <?php echo esc_attr($section_class) ?>">
	
	<?php if (is_a( $post, 'WP_Post' ) && !has_shortcode( $post->post_content, 'vc_row')) { ?>
	<div class="container">
  		<div class="row">
    		<div class="col-md-12">

    <?php } ?>

				<div class="tab-content">

				<?php 
					$isFirst = true;
					foreach ( $tabs as $key => $tab ) : ?>

					<div class="tab-pane fade in <?php echo $isFirst ? ' active' : '' ?>" id="tab-<?php echo $key ?>">
						<?php call_user_func( $tab['callback'], $key, $tab ) ?>
					</div>

				<?php $isFirst = false; endforeach; ?>
				</div>


	<?php if (is_a( $post, 'WP_Post' ) && !has_shortcode( $post->post_content, 'vc_row')) { ?>
			</div>
		</div>
	</div>

    <?php } ?>
</div>
<?php endif; ?>