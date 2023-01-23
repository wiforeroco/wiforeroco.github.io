  <!-- ====  This menu only for mobil start==== \-->
  <?php 
    $menu_effect = cs_get_option('menu_effect');
    $menu_effect = ($menu_effect ==='click') ? 'sgny-menuClick' : '';
  ?>
  <!--/ ====  This menu only for mobil====-->
  <div class="sgny-mobil_menu_warp">
    <?php
      wp_nav_menu(
        array(
          'menu'              => 'primary',
          'theme_location'    => 'primary',
          'menu_class'        => 'slimmenu',
          'menu_id'           => 'sgny-mobil_menu',
          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
          'walker'            => new WP_Bootstrap_Navwalker()
        )
      ); 
    ?>
  </div>
  <!--/ main menu area  end-->
  
  <!-- Main menu area start\-->
  <div class="sgny-menu-hover <?php echo esc_attr($menu_effect); ?>">
    <div class="sgny-menu-nav-shap-warp">
      <span class="sgny-menu-nav-shap"></span>
      <span class="sgny-menu-nav-shap"></span>
      <span class="sgny-menu-nav-shap"></span>
    </div>
    <!-- Main menu start\-->
    <div class="sgny-nav-warp">
      <nav class="sgny-main-menu">
        <?php
          wp_nav_menu(
            array(
              'menu'              => 'primary',
              'theme_location'    => 'primary',
              'menu_class'        => 'sgny-list-unstyled',
              'menu_id'           => 'sgny-menu',
              'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
              'walker'            => new WP_Bootstrap_Navwalker()
            )
          ); 
        ?>
      </nav>
      <!--search form start\-->
      <?php
        $menu_bar_serach = cs_get_option('menu_bar_serach');
        if ($menu_bar_serach) { 
      ?>
      <div class="sgny-search-form-warp">
        <div class="sgny-serch-form">
          <?php get_search_form(); ?>
        </div>
      </div>
      <?php } ?>
    </div>
  </div><!--/ main menu area  end-->
  