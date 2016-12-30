<?php 
$creativa_options = creativa_get_options();

if ($creativa_options['opt-menu-position'] == 1) {
  $menu_position_class = 'nav-menu-left';
}
elseif ($creativa_options['opt-menu-position'] == 2) {
  $menu_position_class = 'nav-menu-center';
}
elseif ($creativa_options['opt-menu-position'] == 3) {
  $menu_position_class = 'nav-menu-right';
}

$hover_style = 'hover-full';
if ($creativa_options['opt-hover-style'] == 2) {
  $hover_style = 'hover-boxed';
}

$nav_sep_class = 'no-nav-separators';
if ($creativa_options['opt-nav-separators'] == 1) {
  $nav_sep_class = 'with-nav-separators';
}

$nav_search_icon = $creativa_options['opt-nav-search'];
$nav_cart_icon = $creativa_options['opt-woo-shop-nav-icon'];
$nav_hamburger_icon = $creativa_options['opt-secondary-nav'];

$nav_icons_class = 'no-nav-icons';
if ($nav_search_icon == 1 || $nav_cart_icon == 1 || $nav_hamburger_icon == 1) {
  $icons_style = $creativa_options['opt-nav-icons-style'];

  $nav_icons_class = 'with-nav-icons ';

  if ($icons_style == 1) {
    $nav_icons_class .= 'nav-icons--text';
  }
  elseif ($icons_style == 2) {
    $nav_icons_class .= 'nav-icons--small';
  }
  elseif ($icons_style == 3) {
    $nav_icons_class .= 'nav-icons--large';
  }
}
?>

<header>

  <?php 
    if (function_exists('creativa_topbar')) {
      creativa_topbar();
    }
  ?>

  <div id="navbar" class="<?php echo esc_attr($menu_position_class) .' '. esc_attr($nav_sep_class) .' '. esc_attr($nav_icons_class) ?>">
    
    <?php 
      if (function_exists('creativa_search')) {
        creativa_search();
      }
    ?>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="navbar-inner">

            <div class="nav-container nav-container-left <?php echo esc_attr($hover_style) ?>">

              <nav class="main-nav menu-nav hidden-xs hidden-sm">          
                
                <?php 
                if ( has_nav_menu( 'main-nav' ) ) {
                  $creativa_meta_custom_menu = $creativa_options['opt-meta-custom-menu'];
                  if ($creativa_meta_custom_menu) {
                    $creativa_menu_id = $creativa_meta_custom_menu;
                  } else {
                    $creativa_menu_id = '';
                  }

                  wp_nav_menu(
                    array(
                      'theme_location'  => 'main-nav',
                      'menu'            => $creativa_menu_id,
                      'link_before'     => '<div class="menu-a-inner"><span>',
                      'link_after'      => '</span></div>',
                    )
                  );
                } else { ?>
                  <div class="menu"><ul><li><a href="<?php echo admin_url('nav-menus.php'); ?>"><div class="menu-a-inner"><span>
                    <?php esc_html_e('Assign menu to this area', 'creativa' ) ?> 
                  </span></div></a></li></ul></div> 
                <?php } ?>

              </nav>

            </div>

            <div class="nav-container nav-container-center">

            <!-- logotype container -->
            <div class="theme-logo">
              <a href="<?php echo esc_url(home_url( '/' )); ?>">
                <?php 
                if ( isset($creativa_options['opt-logo']['url']) && !empty($creativa_options['opt-logo']['url']) ) { ?>
                  <img src="<?php echo esc_url($creativa_options['opt-logo']['url']) ?>" alt="" <?php echo creativa_retina_check($creativa_options['opt-logo']['url'], true) ?>>
                <?php } else { bloginfo('name'); } ?>
              </a>
            </div><!-- logotype container end -->

            </div>

            <div class="nav-container nav-container-right <?php echo esc_attr($hover_style) ?>">
              <?php 
                if ( has_nav_menu( 'splitted-nav-right' ) ) { ?>
                  <nav class="main-nav menu-nav hidden-xs hidden-sm">
                    <?php 
                      wp_nav_menu(
                        array(
                          'theme_location' => 'splitted-nav-right',
                          // 'depth'          => -1,
                          'link_before'     => '<div class="menu-a-inner"><span>',
                          'link_after'      => '</div></span>',
                        )); ?>
                  </nav>
               <?php  }
              ?>

              <?php 
                creativa_navicons();
              ?>

            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
